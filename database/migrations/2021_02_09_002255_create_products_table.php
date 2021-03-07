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
            $table->string('name');
            $table->string('category')->nullable()->index('category');
            $table->foreign('category')->references('name')->on('categories')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->string('option')->nullable()->index('option');
            $table->foreign('option')->references('name')->on('options')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->string('order_method')->nullable()->default('None')->index('order_method');
            $table->foreign('order_method')->references('name')->on('order_method')->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->string('image');
            $table->text('description');
            $table->string('status');
            $table->integer('stock');
            $table->integer('price');
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
