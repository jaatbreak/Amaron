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
     * 
     * 
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar_image')->nullable();
            $table->enum('role', ['user','vendor','admin'])->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status', ['Y','N'])->default('Y');
            $table->string('phone')->unique()->nullable();
            $table->string('address',5000)->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('description')->nullable();
            $table->enum('approve', ['Y','N'])->default('Y');
            $table->enum('verified', ['Y','N'])->default('N');
            $table->enum('is_block', ['Y','N'])->default('N');
            $table->string('commision')->nullable();
            $table->string('gst')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('user_bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_ifsc_code')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('aadhaar_front')->nullable();
            $table->string('aadhaar_back_side')->nullable();
            $table->rememberToken();
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
        
    }
};
