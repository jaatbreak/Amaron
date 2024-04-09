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
        Schema::create('postcontent', function (Blueprint $table) {
            $table->id();
            $table->string('sort')->nullable();
            $table->string('posttype_id');
            $table->longtext('field')->nullable();
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

