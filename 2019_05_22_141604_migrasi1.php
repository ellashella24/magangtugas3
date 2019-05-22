<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Migrasi1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi1', function (Blueprint $table) {
            $table->integer('transaction_id')->autoIncrement;
            $table->char('invoice_code');
            $table->integer('customer_id');
            $table->integer('service_id');
            $table->timestamp('service_start')->useCurrent();
            $table->timestamp('service_expired')->useCurrent();
            $table->decimal('invoice_total',12,2);
            $table->decimal('payment_total',12,2);
            $table->decimal('surcharge',12,2);
            $table->timestamp('payment_time')->useCurrent();
            $table->tinyInteger('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi1');
    }
}
