<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesTableSeeder extends Seeder
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
                'restaurant_id' => 2,
                'user_id' => 2,
            ],
            [
                'restaurant_id' => 10,
                'user_id' => 1,
            ],
            [
                'restaurant_id' => 3,
                'user_id' => 1,
            ],
            [
                'restaurant_id' => 6,
                'user_id' => 1,
            ],
        ];

        foreach ($params as $param) {
            DB::table('favorites')->insert($param);
        }
    }
}
