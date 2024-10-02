<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            [
                'name' => 'Sialkot',
                'country_id' => 162,
            ],
            [
                'name' => 'Lahore',
                'country_id' => 162,
            ],
            [
                'name' => 'Islamabad',
                'country_id' => 162,
            ],
            [
                'name' => 'Karachi',
                'country_id' => 162,
            ],
        ]);
    }
}
