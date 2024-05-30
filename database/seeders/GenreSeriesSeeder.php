<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/* データベースへのレコード追加のために、DBファサードを利用する */
use Illuminate\Support\Facades\DB;

class GenreSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genre_series')->insert(
            [
                ['genre_id' => 1, 'series_id' => 1],
                ['genre_id' => 9, 'series_id' => 2],
                ['genre_id' => 2, 'series_id' => 2],
                ['genre_id' => 10, 'series_id' => 2],
                ['genre_id' => 4, 'series_id' => 3],
                ['genre_id' => 5, 'series_id' => 3],

            ]
        );
    }
}
