<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('members',function (Blueprint $table){
           $table->increments('id')->unsigned();
           $table->string('email',255)->notNull();
           $table->string('password',255)->notNull();
           $table->string('fname',50)->notNull();
           $table->string('lname',50)->notNull();
           $table->enum('title',[1,2,3,4])->notNull();
           $table->string('phone',40)->nullable();
           $table->string('address_city',50)->nullable();
           $table->string('address_suburb',50)->nullable();
           $table->string('address_street',100)->nullable();
           $table->string('postcode',6)->nullable();
           $table->string('avatar',255)->nullable();
           $table->string('like_wine',255)->nullable();
           $table->enum('active',[1,2])->default(2);
           $table->timestamps();
           $table->rememberToken();
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
        Schema::dropIfExists('members');
    }
}
