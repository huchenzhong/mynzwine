<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    //show the index page
    public function show(){
        return view('admin.index.index');
    }

    //show the welcome page inside index page
    public function welcome(){
        return view('admin.index.welcome');
    }

    //user logout
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect("/admin/public/login");
    }
}
