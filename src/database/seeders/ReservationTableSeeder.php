<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'date' => '2021-12-04',
                'time' => '01:28',
                'number' => 2,
                'restaurant_id' => 2,
                'user_id' => 1,
            ],
            [
                'date' => '2021-12-25',
                'time' => '01:28',
                'number' => 4,
                'restaurant_id' => 5,
                'user_id' => 1,
            ],
            [
                'date' => '2021-12-5',
                'time' => '01:28',
                'number' => 4,
                'restaurant_id' => 1,
                'user_id' => 2,
            ],
            [
                'date' => '2021-12-15',
                'time' => '01:28',
                'number' => 4,
                'restaurant_id' => 2,
                'user_id' => 1,
            ],
            [
                'date' => '2021-12-15',
                'time' => '01:28',
                'number' => 4,
                'restaurant_id' => 6,
                'user_id' => 3,
            ],
            [
                'date' => '2021-12-15',
                'time' => '01:28',
                'number' => 4,
                'restaurant_id' => 3,
                'user_id' => 4,
            ],
        ];

        foreach ($params as $param) {
            DB::table('reservations')->insert($param);
        }
    }
}
