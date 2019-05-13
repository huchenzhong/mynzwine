<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    //
    protected $table = 'wine';
    protected $primaryKey = 'id';
    public $timestamps = false;


    //relate to the Varietal model
    public function varietal(){
        return $this->hasOne('App\Admin\Varietal','id','varietal_id');
    }

    //relate to the Winery model
    public function winery(){
        return $this->hasOne('App\Admin\Winery','id','winery_id');
    }
}
