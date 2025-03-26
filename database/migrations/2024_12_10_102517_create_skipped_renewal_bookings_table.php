<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skipped_renewal_bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id');
            $table->integer('property_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('reason');
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
        Schema::dropIfExists('skipped_renewal_bookings');
    }
};
