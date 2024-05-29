<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/* データベースへのレコード追加のために、DBファサードを利用する */
use Illuminate\Support\Facades\DB;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('episodes')->insert(
            [
                ['series_id' => 1, 'subtitle' => 'かに〜序章〜', 'episode_text' => 'こうして、かにの冒険が始まった。', 'is_release' => 1],
                ['series_id' => 1, 'subtitle' => 'かに〜終章〜', 'episode_text' => 'こうして、かにの冒険が終わった。　THE ENDO', 'is_release' => 1],
                ['series_id' => 2, 'subtitle' => 'せみの七日目', 'episode_text' => '嗚呼、死', 'is_release' => 1],
                ['series_id' => 3, 'subtitle' => '秘密の話', 'episode_text' => 'うわああああああああああああああああああああああ', 'is_release' => 0],
                ['series_id' => 3, 'subtitle' => '秘密じゃない話', 'episode_text' => 'こんにちは笑', 'is_release' => 1],
            ]
        );
    }
}
