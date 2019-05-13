<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //
    protected $table = 'regions';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
