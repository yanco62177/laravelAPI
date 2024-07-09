<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyListTable extends Migration
{
    
    public function up()
    {
        Schema::create('my_list', function (Blueprint $table) {
            $table->id('todoId');
            $table->unsignedBigInteger('userID');
            $table->string('description');
            $table->string('activeStatus');
            $table->timestamps();

            $table->foreign('userID')->references('userID')->on('users_lists')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('my_list');
    }
}
