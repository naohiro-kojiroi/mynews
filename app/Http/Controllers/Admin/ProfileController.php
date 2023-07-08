<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return redirect('admin/profile/edit');
    }
}

/*課題1
controllerには何個までActionを実装できるのか、
また、何個くらいの実装が一般的なのか、
指示によってはcontroller1とcontroller2を行ったり来たりするような
物もあるの*/

/*課題2
データをやり取りしたり出力するデータを
生成するところ*/

/*課題3
ユーザーから来たアクセスをRoutingが受け取り、
controllerに渡している。
(controllerの中にあるActionに渡している)
*/
