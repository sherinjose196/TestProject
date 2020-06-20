<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Loans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    
         {
        Schema::create('loans', function(Blueprint $table) {
			$table->increments('id'); 
			$table->text('loan');
			$table->integer('emp_id')->unsigned(); 
			$table->foreign('emp_id')->references('id')->on('employees'); 
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
