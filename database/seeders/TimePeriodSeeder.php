<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimePeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_periods')->truncate(); // Clear existing entries

        DB::table('time_periods')->insert([
            ['name' => 'One Day'],
            ['name' => 'Week'],
            ['name' => '15 Days'],
            ['name' => 'One Month'],
            ['name' => 'Three Months'],
            ['name' => 'Six Months'],
            ['name' => 'One Year'],
        ]);
        // dd(DB::table('time_periods')->get());
    }
}
