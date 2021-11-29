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
                'restaurant_id' => 1,
                'user_id' => 1,
            ],
            [
                'restaurant_id' => 10,
                'user_id' => 1,
            ],
            [
                'restaurant_id' => 12,
                'user_id' => 1,
            ],
        ];

        foreach ($params as $param) {
            DB::table('favorites')->insert($param);
        }
    }
}
