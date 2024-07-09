<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersListsTable extends Migration
{
    
    public function up()
    {
        Schema::create('users_lists', function (Blueprint $table) {
            $table->id('userID');
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('users_lists');
    }
}
