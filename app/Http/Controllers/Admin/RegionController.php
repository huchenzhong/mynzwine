<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Region;

class RegionController extends Controller
{
    //1.show region list
    public function show(){
        $data = Region::get();
        return view('admin.region.region-list',compact('data'));
    }

    //2.add region
    public function add(Request $request){
        if($request->isMethod('get')){
            return view('admin.region.region-add');
        }
        else{
            $this->validate($request,[
                'name' => 'required|min:2|max:50',
                'postage' => 'required|Numeric',
            ]);
            //prepare a data to collect the user input and insert into the database
            $data = [];


            $data['name'] = $request->input('name');
            $data['postage'] = $request->input('postage');
            $data['desc'] = $request->input('desc');

            $result = Region::insert($data);

            if($result){
                return back()->with('msg','Add success!');
            }
            else{
                return back()->withErrors();
            }
        }
    }


    //3.edit region
    public function edit(Request $request,$id){
        if($request->isMethod('get')){
            return view('admin.region.region-edit')->with([
                'id' => $id
            ]);
        }
        else{
            $this->validate($request,[
                'name' => 'required|min:2|max:50',
                'postage' => 'required|Numeric',
            ]);

            $result = Region::where('id',$id)->update([
                'name' => $request->get('name'),
                'postage' => $request->get('postage'),
                'desc' => $request->get('desc'),
            ]);
            if($result){
                return back()->with('msg','Update Success!');
            }
            else{
                return back()->withErrors();
            }
        }
    }


    //4. disable or enable the wine
    public function toggle(Request $request,$id){
        $active = Region::find($id)->active;
        if($active == 2){
            Region::where('id',$id)->update(['active' => 1]);
        }
        else{
            Region::where('id',$id)->update(['active' => 2]);
        }

    }


    //5.delete wine
    public function delete(Request $request,$id){
        $result = Region::where('id',$id)->delete();
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
            $result = Region::where('id',$val)->delete();
            if(!$result){
                DB::rollback();
                return 2;
            }
        }
        DB::commit();
        return 1;
    }

}
