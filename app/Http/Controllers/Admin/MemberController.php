<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Member;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    //1.display the member list
    public function show(){
        $data = Member::get();
        return view('admin.member.member-list',compact('data'));
    }

    //2.delete member
    public function delete(Request $request,$id){
        $result = Member::where('id',$id)->delete();
        if($result){
            return 1;
        }
        else{
            return 2;
        }
    }

    //3. disable or enable the member
    public function toggle(Request $request,$id){
        $active = Member::find($id)->active;
        if($active == 2){
            Member::where('id',$id)->update(['active' => 1]);
        }
        else{
            Member::where('id',$id)->update(['active' => 2]);
        }

    }

    // 4.delete a group of admins
    public function deleteMany(Request $request)
    {
        $data = $request->input("checkedIds");
        $dataArr = explode(",", $data);
        DB::beginTransaction();
        foreach ($dataArr as $val) {
            $result = Member::where('id', $val)->delete();
            if (!$result) {
                DB::rollback();
                return 2;
            }
        }
        DB::commit();
        return 1;
    }

    // 5,show the member like list
    public function show_likes(Request $request,$id){
        $data = Member::find($id)->like_wine;
        $data_arr = explode(',',$data);

        return view('admin.member.member-like',compact('data_arr'));
    }
}
