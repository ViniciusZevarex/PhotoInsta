<?php


use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;


class Likes extends Migration

{


   public function up()

   {

       Schema::create('likes', function (Blueprint $table) {
           $table->bigIncrements('idLikes');
           $table->bigInteger('user_id')->unsigned();
           $table->bigInteger('idPost')->unsigned();
           $table->foreign('user_id')->references('id')->on('users');    
           $table->foreign('idPost')->references('id')->on('posts');
       });

   }


   /**

    * Reverse the migrations.

    *

    * @return void

    */

   public function down()

   {

       Schema::dropIfExists('likes');

   }

}