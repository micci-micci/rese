<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $params = [
                [
                    'name' => '寿司'
                ],
                [
                    'name' => '焼肉'
                ],
                [
                    'name' => '居酒屋'
                ],
                [
                    'name' => 'イタリアン'
                ],
                [
                    'name' => 'ラーメン'
                ]
            ];

            foreach ($params as $param) {
                DB::table('categories')->insert($param);
            }
        }
    }
}
