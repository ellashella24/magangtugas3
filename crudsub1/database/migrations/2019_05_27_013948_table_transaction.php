<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->integer('transaction_id')->autoIncrement();
            $table->char('invoice_code');
            $table->integer('customer_id');
            $table->integer('service_id');
            $table->timestamp('service_start')->useCurrent();
            $table->timestamp('service_expired')->useCurrent();
            $table->decimal('invoice_total', 12, 2);
            $table->decimal('payment_tax', 12, 2);
            $table->decimal('surcharge', 12, 2);
            $table->timestamp('payment_time')->useCurrent();
            $table->tinyInteger('payment_status')->default(0);
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
        Schema::dropIfExists('transaction');
    }
}
