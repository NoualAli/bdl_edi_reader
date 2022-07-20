<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->string('discount_header', 4)->nullable();
            $table->string('iob', 3)->nullable();
            $table->string('nto', 3)->nullable();
            $table->string('nb', 1)->nullable();
            $table->string('pi', 1)->nullable();
            $table->string('rib', 20)->nullable();
            $table->string('ip', 4)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('address', 70)->nullable();
            $table->date('date')->nullable();
            $table->string('discount_reference', 3)->unique();
            $table->string('discount_on', 6)->nullable();
            $table->string('totalAmount', 16)->nullable();
            $table->string('filler', 31)->nullable();

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
        Schema::dropIfExists('payments');
    }
}