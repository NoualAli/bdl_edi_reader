<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivers', function (Blueprint $table) {
            $table->id();

            $table->string('ontto', 10)->nullable();
            $table->string('ontto2', 1)->nullable();
            $table->string('rib', 20)->nullable();
            $table->string('ip', 4)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('address', 70)->nullable();
            $table->string('amount', 15)->nullable();
            $table->string('label', 70)->nullable();
            $table->string('filler', 80)->nullable();

            $table->foreignId('payment_id');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('receivers');
    }
}