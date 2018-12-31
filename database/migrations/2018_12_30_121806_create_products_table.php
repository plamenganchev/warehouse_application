<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->nullable(false);
            $table->mediumText('description',2000)->nullable();
            $table->integer('buy_price')->nullable(false);
            $table->integer('sell_price')->nullable(false);
            $table->integer('number_of_products')->nullable(false);
            $table->string('code')->nullable(false)->unique();
            $table->string('category');
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
