<?php

namespace App\Admin;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Authenticatable
{
    //使用Authenticatable trait来实现Authenticatable类的抽象方法
    use \Illuminate\Auth\Authenticatable;

    protected $fillable = ['id','username','password','gender','mobile','email','role_id','created_at','status'];

}
