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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('category_id')->nullable();
            $table->string('price')->nullable();
            $table->string('delivery_fee')->nullable();
            $table->string('image')->nullable();
            $table->string('custom_color1')->nullable();
            $table->string('custom_color2')->nullable();
            $table->string('custom_color3')->nullable();
            $table->string('custom_color4')->nullable();
            $table->string('custom_color5')->nullable();
            $table->string('custom_color6')->nullable();
            $table->string('sx')->nullable();
            $table->string('s')->nullable();
            $table->string('m')->nullable();
            $table->string('l')->nullable();
            $table->string('xl')->nullable();
            $table->string('xxl')->nullable();
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
