<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//以下の1行を追記することで、News Modelが扱えるようになる
use App\Models\News;

//以下を追記
use App\Models\History;

use Carbon\Carbon;

use App\Models\Horse;

class NewsController extends Controller
{
    public function add()
    {
        $horses=Horse::all();
        return view('admin.news.create', compact('horses'));
        
    }
    
    public function create(Request $request)
    {
        //Validationを行う
        $this->validate($request, News::$rules);
        
        $news = new News;
        $form = $request->all();
        
        //フォームから画像が送信されてきたら、保存して、$news->image_pathに画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }
        
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        //フォームから送信されてきたimageを削除する
        unset($form['image']);
        
        //データベースに保存する
        $news->fill($form);
        $news->save();
        
        // admin/news/createにリダイレクトする
        return redirect('admin/news/create');
    }
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        $cond_horse = $request->cond_horse;
        $query = News::query();
        if ($cond_title != '') {
            //検索されたら検索結果を取得する
            $query->where('title', $cond_title);
        } 
        if($cond_horse != '') {
            $query->orwhere('horse', $cond_horse);
        } 
        $posts = $query->get();
        $horses = Horse::all();
        return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title, 'cond_horse' => $cond_horse, 'horses' => $horses ]);
    }
    
    public function edit(Request $request)
    {
        //News Modelからデータを取得する
        $news = News::find($request->id);
        if (empty($news)) {
            abort(404);
        }
        $horses=Horse::all();
        return view('admin.news.edit', ['news_form' => $news, 'horses' => $horses]);
    }
    
    public function update(Request $request)
    {
        //Validationをかける
        $this->validate($request, News::$rules);
        //News Modelからデータを取得する
        $news = News::find($request->id);
        //送信されてきたフォームデータを格納する
        $news_form = $request->all();
        
        if ($request->remove == 'true') {
            $news_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $news_form['image_path'] = basename($path);
        } else {
            $news_form['image_path'] = $news->image_path;
        }
        
        unset($news_form['image']);
        unset($news_form['remove']);
        unset($news_form['_token']);
        
        //該当するデータを上書きして保存する
        $news->fill($news_form)->save();
        
        //以下を追記
        $history = new History();
        $history->news_id = $news->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/news');
    }
    
    //以下を追記
    
    public function delete(Request $request)
    {
        //該当するNews Modelを取得
        $news = News::find($request->id);
        
        //削除する
        $news->delete();
        
        return redirect('admin/news/');
    }
    
}
