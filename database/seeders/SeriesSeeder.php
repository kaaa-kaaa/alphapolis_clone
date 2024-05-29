<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/* データベースへのレコード追加のために、DBファサードを利用する */
use Illuminate\Support\Facades\DB;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('series')->insert(
            [
                ['member_id' => 1, 'title' => 'かにシリーズ', 'abstract' => 'かにのシリーズです。'],
                ['member_id' => 2, 'title' => 'せみ短編', 'abstract' => 'みんみん'],
                ['member_id' => 2, 'title' => 'ヒミツ', 'abstract' => '秘密なのか秘密じゃないのか'],

            ]
        );
    }


}
