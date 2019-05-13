<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('wine',function(Blueprint $table){
           $table->increments('id')->unsigned();
           $table->string('name',50);
           $table->decimal('price');
           $table->string('image',255)->nullable();
           $table->string('desc',255)->nullable();
           $table->enum('is_soldout',[1,2])->default(2);
           $table->integer('winery_id');
           $table->tinyInteger('varietal_id');
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
        Schema::dropIfExists('wine');
    }
}
