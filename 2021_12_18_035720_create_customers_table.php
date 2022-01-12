<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');       // alias of bigInt // increments('id')  --auto increments unsigned integer or  bigincrements('id')  --auto increments unsigned bigint
            $table->unsignedInteger('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->string('name')->nullable();   
            $table->bigInteger('contact')->nullable();
            $table->bigInteger('flatNo')->nullable();
            $table->mediumText('Address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
