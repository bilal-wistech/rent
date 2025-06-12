<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('area_seos', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id')->after('area_id');
            $table->unsignedBigInteger('country_id')->after('city_id');

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('area_seos', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['country_id']);
            $table->dropColumn(['city_id', 'country_id']);
        });
    }
};
