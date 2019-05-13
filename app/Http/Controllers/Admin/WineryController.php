<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Admin;
use App\Admin\Winery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WineryController extends Controller
{
    // 1.display the winery list
    public function show(){
        $data = Winery::get();
        return view('admin/winery/winery-list',compact("data"));
    }

    // 2.add winery
    public function add(Request $request){
        if($request->isMethod('get')){
            return view('admin.winery.winery-add');
        }
        else{
            $this->validate($request,[
               'name' => 'required|min:4|max:50',
               'email' => 'nullable|email',
            ]);

            $data = [];
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $file = $request->file('image');
                $filename = md5(time().rand(10000,99999).".".$file->getClientOriginalExtension());
                $file->move('./admin/images/uploads/winery',$filename);
                $data['image'] = "/admin/images/uploads/winery/".$filename;
            }
            $data['name'] = $request->input('name');
            $data['desc'] = $request->input('desc');
            $data['phone'] = $request->input('phone');
            $data['email'] = $request->input('email');
            $data['address'] = $request->input('address');
            $data['url'] = $request->input('url');
            $data['created_at'] = date("Y-m-d",time());
            $data['active'] = 2;
            $result = Winery::insert($data);

            if($result){
                return back()->with('msg','Add successfully');
            }
            else{
                return redirect("/admin/winery/winery-add")->withErrors();
            }
        }
    }


    // 3.update the winery information
    public function edit(Request $request,$id){
        if($request->isMethod('get')){
            return view('admin.winery.winery-edit',compact('id'));
        }
        else{
            $this->validate($request,[
                'email' => 'E-Mail'
            ]);

            $data = [];
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $file = $request->file('image');
                $filename = md5(time().rand(10000,99999).".".$file->getClientOriginalExtension());
                $file->move('./admin/images/uploads/winery',$filename);
                $data['image'] = "/admin/images/uploads/winery/".$filename;
            }
            $data['name'] = $request->input('name');
            $data['desc'] = $request->input('desc');
            $data['phone'] = $request->input('phone');
            $data['email'] = $request->input('email');
            $data['address'] = $request->input('address');
            $data['url'] = $request->input('url');
            $data['created_at'] = date("Y-m-d",time());
            $data['active'] = 2;
            $result = Winery::where('id',$id)->update($data);

            if($result){
                return back()->with('msg','Update Success!');
            }
            else{
                return back()->withErrors();
            }
        }
    }

    // 4.change the winery active status
    public function toggle(Request $request,$id){
        $active = Winery::find($id)->active;
        if($active == 2){
            Winery::where('id',$id)->update(['active' => 1]);
        }
        else{
            Winery::where('id',$id)->update(['active' => 2]);
        }

    }

    //5,delete Winery
    public function delete(Request $request,$id){
        $result = Winery::where('id',$id)->delete();
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
            $result = Winery::where('id',$val)->delete();
            if(!$result){
                DB::rollback();
                return 2;
            }
        }
        DB::commit();
        return 1;
    }
}
