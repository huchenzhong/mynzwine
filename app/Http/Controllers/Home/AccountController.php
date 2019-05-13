<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Member;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //edit user information
    public function edit(Request $request){
        if($request->isMethod('get')) {
            return view('home.profile');
        }
        else{
            $this->validate($request,[
                'fname' => 'required|min:2|max:50',
                'lname' => 'required|min:2|max:50',
                'phone' => 'nullable',
                'address_street' => 'nullable|max:50',
                'address_suburb' =>'nullable|max:50',
                'address_city' => 'nullable|max:50',
                'postcode' => 'nullable|max:6',
            ]);

            $data = [];

            // check if there is any upload file
            if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
                $file = $request->file('avatar');
                $filename = md5(time().rand(10000,99999)).".".$file->getClientOriginalExtension();
                $file->move('./admin/images/uploads/member',$filename);
                $data['avatar'] = "/admin/images/uploads/member/".$filename;
            }

            $data['fname'] = $request->input('fname');
            $data['lname'] = $request->input('lname');
            $data['phone'] = $request->input('phone');
            $data['address_street'] = $request->input('address_street');
            $data['address_suburb'] = $request->input('address_suburb');
            $data['address_city'] = $request->input('address_city');
            $data['postcode'] = $request->input('postcode');

            $result = Member::where('id',Auth::guard('member')->user()->id)->update($data);
            if($result){
                return back()->with('msg','Update Success!');
            }
            else{
                return back()->withErrors();
            }

        }
    }
}
