<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//追記
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $hedline = null;
        }
        
        //news/index.blade.phpファイルを渡している
        //また Viewテンプレートにheadline、posts、という変数を渡している
        return view('news.index', ['headlien' => $headline, 'posts' => $posts]);
        
    }
}
