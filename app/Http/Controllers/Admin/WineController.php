<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Wine;
use App\Admin\Winery;
use App\Admin\Varietal;
use Illuminate\Support\Facades\DB;


class WineController extends Controller
{
    //1. display all the wine
    public function show(){
        $data = Wine::get();
        return view('admin.wine.wine-list',compact('data'));
    }


    //2, add wine to the database
    public function add(Request $request){
        if($request->isMethod('get')){
            $winery_list = Winery::get();
            $varietal_list = Varietal::get();
            return view('admin.wine.wine-add')->with(['winery_list' => $winery_list,'varietal_list' => $varietal_list]);
        }
        else{
            $this->validate($request,[
                'name' => 'required|min:3|max:50',
                'winery' => 'required',
                'varietal' => 'required',
                'vintage' =>'required',
                'price' => 'required|Numeric',
            ]);

            //prepare a data to collect the user input and insert into the database
            $data = [];

            // check if there is any upload file
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $file = $request->file('image');
                $filename = md5(time().rand(10000,99999)).".".$file->getClientOriginalExtension();
                $file->move('./admin/images/uploads/wine',$filename);
                $data['image'] = "/admin/images/uploads/wine/".$filename;
            }

            $data['name'] = $request->input('name');
            $data['winery_id'] = $request->input('winery');
            $data['varietal_id'] = $request->input('varietal');
            $data['vintage'] = $request->input('vintage');
            $data['price'] = $request->input('price');
            $data['desc'] = $request->input('desc');

            $result = Wine::insert($data);

            if($result){
                return back()->with('msg','Add success!');
            }
            else{
                return back()->withErrors();
            }
        }
    }

    //3. edit wine
    public function edit(Request $request,$id){
        if($request->isMethod('get')){
            $winery_list = Winery::get();
            $varietal_list = Varietal::get();
            return view('admin.wine.wine-edit')->with([
                'winery_list' => $winery_list,
                'varietal_list' => $varietal_list,
                'id' => $id
            ]);
        }
        else{
            $this->validate($request,[
                'name' => 'required|min:3|max:50',
                'winery' => 'required',
                'varietal' => 'required',
                'vintage' =>'required',
                'price' => 'required|Numeric',
            ]);

            $data = [];

            // check if there is any upload file
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $file = $request->file('image');
                $filename = md5(time().rand(10000,99999)).".".$file->getClientOriginalExtension();
                $file->move('./admin/images/uploads/wine',$filename);
                $data['image'] = "/admin/images/uploads/wine/".$filename;
            }

            $data['name'] = $request->input('name');
            $data['winery_id'] = $request->input('winery');
            $data['varietal_id'] = $request->input('varietal');
            $data['vintage'] = $request->input('vintage');
            $data['price'] = $request->input('price');
            $data['desc'] = $request->input('desc');

            $result = Wine::where('id',$id)->update($data);
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
        $is_soldout = Wine::find($id)->is_soldout;
        if($is_soldout == 2){
            Wine::where('id',$id)->update(['is_soldout' => 1]);
        }
        else{
            Wine::where('id',$id)->update(['is_soldout' => 2]);
        }

    }


    //5.delete wine
    public function delete(Request $request,$id){
        $result = Wine::where('id',$id)->delete();
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
            $result = Wine::where('id',$val)->delete();
            if(!$result){
                DB::rollback();
                return 2;
            }
        }
        DB::commit();
        return 1;
    }






}
