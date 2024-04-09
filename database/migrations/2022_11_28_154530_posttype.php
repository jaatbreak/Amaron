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
        Schema::create('posttype', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('url')->nullable();
            $table->string('page')->nullable();
            $table->string('desc')->nullable();
            $table->string('is_repeat')->nullable();
            $table->string('bg_color')->nullable();
            $table->string('image')->nullable();
            $table->longtext('fields')->nullable();
            $table->enum('status', ['Y','N'])->index()->default('Y');
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
