<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('section_contents', function (Blueprint $table) {
             DB::statement("ALTER TABLE section_contents MODIFY COLUMN type ENUM('features', 'services', 'additional-services', 'value-proposition', 'concierge-services') NOT NULL");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('section_contents', function (Blueprint $table) {
            //
        });
    }
};
