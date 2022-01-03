<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('seller_id')->nullable(); 
            $table->foreign('seller_id')->references('id')->on('sellers')->onUpdate('cascade')->onDelete('cascade'); 

            $table->unsignedInteger('category_id')->nullable();   
            $table->foreign('category_id')->references('id')->on('categories')
             ->onUpdate('cascade')->onDelete('cascade'); 

            $table->string('productName')->nullable();
            $table->unsignedBigInteger('quantity')->nullable();  
            $table->unsignedBigInteger('weight')->nullable(); 
            $table->unsignedBigInteger('boxes')->nullable(); 
            $table->unsignedBigInteger('MRP')->nullable(); 
            $table->unsignedBigInteger('costprice')->nullable(); 
            $table->string('image')->nullable();   
            $table->string('productDescription')->nullable(); 
            $table->boolean('active')->default(1); 
            $table->softDeletes(); 
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
        Schema::dropIfExists('products');
    }
}
