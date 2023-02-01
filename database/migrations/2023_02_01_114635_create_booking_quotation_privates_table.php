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
        Schema::create('booking_quotation_privates', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id');
            $table->string('quotation_id');
            $table->string('package_name');
            $table->integer('total_price');
            $table->integer('price_deposit');
            $table->string('package_file');
            $table->text('quotation_detail');
            $table->string('quotation_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_quotation_privates');
    }
};
