<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('employees', function(Blueprint $table)
    {
        $table->increments('id');
       
        $table->string('name');
        $table->integer('phone');
        $table->string('email')->unique();
        $table->string('password', 60);
        $table->string('filename')->nullable();
        $table->rememberToken();
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
        //
    }
}
