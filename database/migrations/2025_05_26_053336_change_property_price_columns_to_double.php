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
        Schema::table('property_price', function (Blueprint $table) {
            $table->double('cleaning_fee')->change();
            $table->double('guest_after')->change();
            $table->double('guest_fee')->change();
            $table->double('security_fee')->change();
            $table->double('price')->change();
            $table->double('weekend_price')->change();
            $table->double('weekly_discount')->change();
            $table->double('monthly_discount')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_price', function (Blueprint $table) {
            $table->integer('cleaning_fee')->change();
            $table->integer('guest_after')->change();
            $table->integer('guest_fee')->change();
            $table->integer('security_fee')->change();
            $table->integer('price')->change();
            $table->integer('weekend_price')->change();
            $table->integer('weekly_discount')->change();
            $table->integer('monthly_discount')->change();
        });
    }
};
