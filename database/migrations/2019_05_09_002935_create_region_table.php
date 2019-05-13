<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('regions',function (Blueprint $table){
            $table->tinyIncrements('id')->unsigned();
            $table->string('name',50)->notNull();
            $table->decimal('postage')->notNull();
            $table->string('desc',255)->nullable();
            $table->enum('active',[1,2])->default(2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists("regions");
    }
}
