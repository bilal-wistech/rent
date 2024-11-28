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
        DB::statement("
            ALTER TABLE `property_dates`
            MODIFY COLUMN `status` ENUM('booked not paid', 'booked paid', 'maintainence', 'booked but not fully paid')
            NOT NULL DEFAULT 'booked paid'
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_dates', function (Blueprint $table) {
            //
        });
    }
};
