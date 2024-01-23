<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('brand_title')->nullable();
            $table->string('category')->nullable();
            $table->string('cement_brand')->nullable();
            $table->string('cement_brand_type')->nullable();
            $table->string('rod_brand')->nullable();
            $table->string('rod_size')->nullable();
            $table->text('product_details')->nullable();
            $table->string('image')->nullable();
            $table->string('price')->nullable();
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
};
