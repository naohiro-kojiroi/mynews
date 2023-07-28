<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $posts = Profile::all()->sortByDesc('updated_at');
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $hedline = null;
        }
        
        //Profile/index.blade.phpファイルを渡している
        //また Viewテンプレートにheadline、posts、という変数を渡している
        return view('profile.index', ['headline' => $headline, 'posts' => $posts]);
        
    }
}
