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
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('desc')->nullable();
            $table->string('thumbnail', 1000)->nullable();
            $table->string('banner_image', 1000)->nullable();
            $table->enum('status', ['Y','N'])->index()->default('Y'); 
            $table->string('parent')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_content')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->timestamps();
            // $table->unsignedBigInteger('category')->nullable();
            // $table->foreign('category')->references('id')->on('category');
            
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
