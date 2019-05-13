<?php

namespace App\Admin;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Member extends Model implements Authenticatable
{
    //
    use \Illuminate\Auth\Authenticatable;

    protected $table = 'members';
    protected $primaryKey = 'id';
}
