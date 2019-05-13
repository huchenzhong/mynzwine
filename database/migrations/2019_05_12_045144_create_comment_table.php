<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('comments',function (Blueprint $table){
           $table->increments('id')->unsigned();
           $table->integer('member_id')->unsigned();
           $table->integer('wine_id')->unsigned();
           $table->enum('review',[1,2,3,4,5])->notNull();
           $table->string('content',255)->nullable();
           $table->timestamps();
           $table->enum('is_hidden',[1,2])->default(2);
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
        Schema::dropIfExists('comments');
    }
}
