<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //
    public function test(){
        $result = DB::table("members")->pluck("id")->toArray();
        return array_rand($result);
    }
}
