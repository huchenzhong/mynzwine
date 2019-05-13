<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWineryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('winery',function(Blueprint $table){
            $table->increments('id');
            $table->string('name',50)->notNull();
            $table->string('desc',500);
            $table->string('phone',50);
            $table->string('email',50);
            $table->string('address',255);
            $table->string('image',255);
            $table->string('url',255);
            $table->timestamps();
            $table->enum('active',[1,2])->default(1);
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
        Schema::dropIfExists('winery');
    }
}
