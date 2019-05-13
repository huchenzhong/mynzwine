<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Varietal extends Model
{
    //
    protected $table = 'varietal';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
