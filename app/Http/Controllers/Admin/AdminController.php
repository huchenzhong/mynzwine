<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    // 1.show the admin list
    public function show(){

        $data = Admin::get();
        return view("admin.admin.admin-list",compact('data'));
    }



    // 2.update the admin information
    public function edit(Request $request,$id){
        if($request->isMethod('get')) {
            return view("admin.admin.admin-edit",compact('id'));
        }
        else{
            $this->validate($request,[
               'mobile' => 'Numeric',
               'email' => 'E-Mail'
            ]);
            if($request->has('password')){
                $this->validate($request,[
                    'password' => 'min:6|max:20',
                    'password2' => 'same:password'
                ]);
                $result1 = Admin::where('id',$id)->update([
                   'password' => bcrypt($request->get('password'))
                ]);
                if(!$result1){
                    return redirect('/admin/admin/admin-edit/'.$id)->withErrors();
                }
            }
            $result2 = Admin::where('id',$id)->update([
                'gender' => $request->get('gender'),
                'mobile' => $request->get('mobile'),
                'email' => $request->get('email'),
                'role_id' => $request->get('role')
            ]);
            if($result2){
                return back()->with('msg','Update Success!');
            }
            else{
                return redirect("/admin/admin/admin-edit/".$id)->withErrors();
            }
        }
    }

    // 3.add admin
    public function add(Request $request){
        if($request->isMethod('GET')){
            return view("admin.admin.admin-add");
        }
        elseif ($request->isMethod('post')){
            $this->validate($request,[
                'username' => 'required|max:30|min:3|Unique:admins',
                'password' => 'required|max:20|min:6',
                'password2' => 'required|same:password',
                'gender' => 'required',
                'mobile' => 'required|Numeric',
                'email' => 'required|E-Mail',
            ]);
            $result = Admin::create([
                'username' => $request->get('username'),
                'password' => bcrypt($request->get('password')),
                'gender' => $request->get('gender'),
                'mobile' => $request->get('mobile'),
                'email' => $request->get('email'),
                'role_id' => $request->get('role'),
                'created_at' => date("Y-m-d H:i:s",time()),
                'status' => 2
            ]);

            if($result){
                return back()->with('msg','Add successfully');
            }
            else{
                return redirect("/admin/admin/admin-add")->withErrors();
            }

        }
    }

    // 4.enable or disable admin
    public function toggle(Request $request,$id){
        $status = Admin::find($id)->status;
        if($status == 2){
            Admin::where('id',$id)->update([
                'status' => 1
            ]);
        }
        elseif($status == 1){
            Admin::where('id',$id)->update([
                'status' => 2
            ]);
        }
    }


    // 5.delete admin
    public function delete(Request $request,$id){
        $result = Admin::where('id',$id)->delete();
        if($result){
            return 1;
        }
        else{
            return 2;
        }
    }


    // 6.delete a group of admins
    public function deleteMany(Request $request){
        $data = $request->input("checkedIds");
        $dataArr = explode(",",$data);
        DB::beginTransaction();
        foreach ($dataArr as $val){
            $result = Admin::where('id',$val)->delete();
            if(!$result){
                DB::rollback();
                return 2;
            }
        }
        DB::commit();
        return 1;
    }


}
















