<?php


use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;


class Comments extends Migration

{

   /**

    * Run the migrations.

    *

    * @return void

    */

   public function up()

   {

       Schema::create('Comments', function (Blueprint $table) {

           $table->bigIncrements('idComments');

           $table->integer('user_id');

           $table->string('comentario')->nullable();

           $table->integer('likesComentario')->default(0);

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