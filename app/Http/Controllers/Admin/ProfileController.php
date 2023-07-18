<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Profile;

class ProfileController extends Controller
{
    //以下を課題にて追加課題4,5
    public function add()
    {
        return view('admin/profile/create');
    }
    public function create()
    {
        return redirect('admin/profile/create');
    }
    public function edit()
    {
        return view('admin.profile.edit');
    }
    public function update()
    {
        
        //課題14追記
        //Validationを行う
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        //データベースに保存する
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/edit');
    }
}
