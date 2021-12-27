<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantsTableSeeder extends Seeder
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
                'name' => '仙人',
                'area_id' => 13,
                'user_id' => 1,
                'category_id' => 1,
                'description' => '料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg'
            ],
            [
                'name' => '牛助',
                'area_id' => 27,
                'user_id' => 1,
                'category_id' => 2,
                'description' => '焼肉業界で20年間経験を積み、肉を熟知したマスターによる実力派焼肉店。長年の実績とお付き合いをもとに、なかなか食べられない希少部位も仕入れております。また、ゆったりとくつろげる空間はお仕事終わりの一杯や女子会にぴったりです。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg'
            ],
            [
                'name' => 'ルーク',
                'area_id' => 13,
                'user_id' => 1,
                'category_id' => 4,
                'description' => '都心にひっそりとたたずむ、古民家を改築した落ち着いた空間です。イタリアで修業を重ねたシェフによるモダンなイタリア料理とソムリエセレクトによる厳選ワインとのペアリングが好評です。ゆっくりと上質な時間をお楽しみください。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg'
            ],
            [
                'name' => '志摩屋',
                'area_id' => 40,
                'user_id' => 3,
                'category_id' => 5,
                'description' => 'ラーメン屋とは思えない店内にはカウンター席はもちろん、個室も用意してあります。ラーメンはこってり系・あっさり系ともに揃っています。その他豊富な一品料理やアルコールも用意しており、居酒屋としても利用できます。ぜひご来店をお待ちしております。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg'
            ],
            [
                'name' => '香',
                'area_id' => 13,
                'user_id' => 1,
                'category_id' => 2,
                'description' => '大小さまざまなお部屋をご用意してます。デートや接待、記念日や誕生日など特別な日にご利用ください。皆様のご来店をお待ちしております。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg'
            ],
            [
                'name' => 'JJ',
                'area_id' => 27,
                'user_id' => 3,
                'category_id' => 4,
                'description' => 'イタリア製ピザ窯芳ばしく焼き上げた極薄のミラノピッツァや厳選されたワインをお楽しみいただけます。女子会や男子会、記念日やお誕生日会にもオススメです。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg'
            ]
        ];

        foreach ($params as $param) {
            DB::table('restaurants')->insert($param);
        }
    }
}
