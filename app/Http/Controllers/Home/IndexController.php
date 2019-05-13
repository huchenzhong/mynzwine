<?php

namespace App\Http\Controllers\Home;

use App\Admin\Winery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin\Member;

class IndexController extends Controller
{
    //show the homepage
    public function index(){
        // get winery data from the database
        $winery_data = Winery::get();
        return view("home.index",compact('winery_data'));
    }

    //login
    public function login(Request $request){
        // validate the user input
        $this->validate($request,[
            'email' => "required|email",
            'password' => "required|min:6|max:30",
        ]);

        // verify email and password
        $data = $request->only(['email','password']);
        $data['active'] = 2;
        $result = Auth::guard('member')->attempt($data,$request->get('remember'));
        if($result){
            return redirect("/");
        }
        else{
            echo "fail";
        }
    }

    //logout
    public function logout(){
        Auth::guard('member')->logout();
        return redirect("/");
    }


    //register
    public function register(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'fname' => 'required|max:30|min:2',
            'lname' => 'required|max:30|min:2',
            'password' => 'required|max:20|min:6',
            'password2' => 'required|same:password',
            'email' => 'required|email|unique:members,email',
            'phone' => 'nullable|Numeric',
            'address_street' => 'nullable|max:50',
            'address_suburb' => 'nullable|max:50',
            'address_city' => 'nullable|max:50',
            'postcode' => 'nullable|max:6',
        ]);

        $data = [
            'fname' => $request->get('fname'),
            'lname' => $request->get('lname'),
            'password' => bcrypt($request->get('password')),
            'title' => $request->get('title'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address_street' => $request->get('address_street'),
            'address_suburb' => $request->get('address_suburb'),
            'address_city' => $request->get('address_city'),
            'postcode' => $request->get('postcode'),
            'like_wine' => '',
            'created_at' => date("Y-m-d H:i:s",time()),
            'active' => 2
        ];

        if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
            $avatar = $request->file('avatar');
            $new_name = md5(time().rand(10000,99999)).".".$avatar->getClientOriginalExtension();
            $avatar->move('./admin/images/uploads/member',$new_name);
            $data['avatar'] = "/admin/images/uploads/member/".$new_name;
        }


        $result = Member::insert($data);

        if($result){
            return back()->with('msg','Add successfully');
        }
        else{
            return back()->withErrors();
        }
    }
}
