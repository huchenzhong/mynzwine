<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PublicController extends Controller{
    //
    public function login(){
        return view('admin.public.login');
    }

    public function check(Request $request){
        // 检查用户输入的合法性
        $this->validate($request,[
           'username' => "required|min:2|max:30",
           'password' => "required|min:6|max:30",
           'captcha' => "required|size:5|captcha"
        ]);

        // 对用户名和密码进行验证
        $data = $request->only(['username','password']);
        $data["status"] = 2;
        $result = Auth::guard('admin')->attempt($data,$request->get('online'));
        if($result){
            //go to the homepage
            return redirect("/admin/index/show");
        }
        else{
            //go back to the login page
            return redirect("/admin/public/login")->withErrors([
                'loginError' => 'username or password is wrong',
            ]);
        }
    }


}
