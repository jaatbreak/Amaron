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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('c_id');
            $table->string('username')->nullable();
            $table->string('currency')->nullable();
            $table->string('company_name')->nullable();
            $table->string('shipping')->nullable();
            $table->string('country')->nullable();
            $table->string('order_notes')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('longtext')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->enum('return_order', ['0','1'])->index()->default('0');
            $table->string('return_reason')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('order_status')->nullable();
            $table->enum('payment_status', ['Y','N'])->index()->default('Y');
            $table->timestamp('date')->useCurrent();
            $table->enum('status', ['Y','N'])->index()->default('Y');
            $table->string('coupon_code')->nullable();
            $table->longtext('data')->nullable();
            $table->string('transaction_detail')->nullable();
            $table->float('order_total', 10, 2);
            $table->float('tax', 10, 2);
            $table->float('coupon_discount', 10, 2);
            $table->float('grand_total', 10, 2);
            $table->double('vendor_id')->nullable();
            $table->string('child_order_ids')->nullable();
            $table->string('rand')->nullable();
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
