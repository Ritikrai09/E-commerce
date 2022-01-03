<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            
            $table->increments('id'); 
            $table->string('CompanyName');  
            $table->string('SellerName');  
            $table->string('email')->unique();  
            $table->string('password');
            $table->bigInteger('contact');
            $table->mediumText('officeAddress');
            $table->string('city');
            $table->string('state');
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
        Schema::dropIfExists('sellers');
    }
}
