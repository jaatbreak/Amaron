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
        Schema::create('attributes_products', function (Blueprint $table) {
            $table->id();
            $table->double('product_id');
            $table->text('slug');
            $table->text('product_name');
            $table->text('attributes');
            $table->double('product_regular_price_doller')->nullable();
            $table->double('product_sale_price_doller')->nullable();
            $table->double('product_regular_price')->nullable();
            $table->double('product_sale_price');
            $table->text('product_image')->nullable();
            $table->text('product_gallery')->nullable();
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
};




