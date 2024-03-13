<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // payment_amount
            $table->integer('payment_amount');
            // sub_total
            $table->integer('sub_total');
            // tax
            $table->decimal('tax');
            // discount
            $table->decimal('discount');
            // service_charge
            $table->decimal('service_charge');
            // total
            $table->decimal('total');
            // payment_method
            $table->string('payment_method');
            // total_item
            $table->integer('total_item');
            // id_kasir
            $table->integer('id_kasir');
            // nama_kasir
            $table->string('nama_kasir');
            // transaction_time
            $table->string('transaction_time');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
