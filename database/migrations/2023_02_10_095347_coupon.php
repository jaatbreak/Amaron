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
        Schema::create('coupon', function (Blueprint $table) {
            $table->id();
            $table->enum('featured', ['Y','N'])->default('N');
            $table->string('coupon_code');
            $table->enum('type', ['flat','Percent'])->default('flat');
            $table->string('discount');
            $table->string('min_value');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('message')->nullable();
            $table->string('image')->nullable();
            $table->longText('desc')->nullable();
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


