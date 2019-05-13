<?php

namespace App\Http\Controllers\Home;

use App\Admin\Member;
use App\Admin\Wine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WineController extends Controller
{
    //show the wine page
    public function show(){
        $data = Wine::where('is_soldout','2')->paginate(6);
        if(Auth::guard('member')->user()) {
            $likes = Member::select('like_wine')->where('id', Auth::guard('member')->user()->id)->get();
            $likeList = explode(",",$likes[0]->like_wine);
            return view('home.wine',compact('data','likeList'));
        }
        return view('home.wine',compact('data'));
    }


    //like and dislike wine
    public function toggle(Request $request,$id){
        $like_wine = Auth::guard('member')->user()->like_wine;
        $like_wine_arr = explode(",",$like_wine);
        $is_like = in_array($id,$like_wine_arr);
        if($is_like){
            $index = array_search($id,$like_wine_arr);
            unset($like_wine_arr[$index]);
        }
        else{
            $like_wine_arr[] = $id;
        }
        $like_wine = implode(",",$like_wine_arr);
        Member::where('id',Auth::guard('member')->user()->id)->update([
            'like_wine' => $like_wine,
        ]);
    }


    //show the liked wine of the member
    public function likes(){
        $like_wine = Auth::guard('member')->user()->like_wine;
        $like_wine_arr = explode(",",$like_wine);
        $data = Wine::whereIn('id',$like_wine_arr)->paginate(6);
        return view("home.likes",compact("data"));
    }

    //show the wine of certain winery
    public function wineryCheck(Request $request,$winery_id){
        $data = Wine::where('winery_id',$winery_id)->paginate(6);
        if(Auth::guard('member')->user()) {
            $likes = Member::select('like_wine')->where('id', Auth::guard('member')->user()->id)->get();
            $likeList = explode(",",$likes[0]->like_wine);
            return view('home.wine',compact('data','likeList'));
        }
        return view('home.winery-wine',compact("data"));
    }
}
