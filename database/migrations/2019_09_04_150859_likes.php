<?php


use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;


class Likes extends Migration

{


   public function up()

   {

       Schema::create('Likes', function (Blueprint $table) {

           $table->bigIncrements('idLikes');

           $table->integer('user_id');    

           $table->bigIncrements('idPost');
           
           $table->integer('likes')->default(0);     

           $table->timestamps();

       });

   }


   /**

    * Reverse the migrations.

    *

    * @return void

    */

   public function down()

   {

       Schema::dropIfExists('Comments');

   }

}