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
            $table->double('vendor_id');
            $table->text('product_name');
            $table->text('slug');
            $table->longText('product_desc')->nullable();
            $table->text('product_sort_desc')->nullable();
            $table->text('product_category')->nullable();
            $table->enum('is_featured', ['0','1'])->default('0');
            $table->enum('is_popular', ['0','1'])->default('0');
            $table->text('product_image')->nullable();
            $table->text('product_gallery')->nullable();
            $table->double('product_regular_price')->nullable();
            $table->double('product_sale_price');
            $table->double('product_regular_price_doller')->nullable();
            $table->double('product_sale_price_doller')->nullable();
            $table->bigInteger('stock_quantity');
            $table->enum('stock_status', ['0','1'])->default('0');
            $table->text('hsn')->nullable();
            $table->enum('publish', ['0','1'])->default('1');
            $table->enum('allow_return', ['0','1'])->default('0');
            $table->enum('allow_cod', ['0','1'])->default('0');
            $table->enum('on_sale', ['0','1'])->default('0');
            $table->enum('allow_reviews', ['0','1'])->default('0');
            $table->text('weight')->nullable();
            $table->text('height')->nullable();
            $table->text('width')->nullable();
            $table->text('length')->nullable();
            $table->bigInteger('sgst')->nullable();
            $table->bigInteger('cgst')->nullable();
            $table->bigInteger('igst')->nullable();
            $table->text('purchase_note')->nullable();
            $table->enum('status', ['Y','N'])->default('Y');
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
