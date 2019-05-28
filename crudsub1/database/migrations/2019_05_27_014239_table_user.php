<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->integer('customer_id')->autoIncrement();
            $table->char('customer_code');
            $table->string('customer_name');
            $table->string('customer_address');
            $table->string('customer_district');
            $table->string('customer_city');
            $table->string('customer_province');
            $table->char('customer_postalcode');
            $table->string('customer_email');
            $table->string('customer_password');
            $table->timestamp('service_start')->useCurrent();
            $table->timestamp('service_expired')->useCurrent();
            $table->tinyInteger('payment_status')->default(1);
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
        Schema::dropIfExists('user');
    }
}
