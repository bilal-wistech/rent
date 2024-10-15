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
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id');
            $table->enum('booking_type', ['daily', 'weekly', 'monthly', 'yearly']);
            $table->enum('alert', ['yes', 'no'])->default('yes');
            $table->integer('alert_days_before');
            $table->enum('send_alert_to', ['admin', 'landlord', 'tenant'])->default('admin');
            $table->integer('alert_type_id');
            $table->integer('template_id');
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
        Schema::dropIfExists('alerts');
    }
};
