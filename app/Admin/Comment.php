<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $primaryKey = 'id';
}
