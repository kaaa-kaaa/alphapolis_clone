<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/* データベースへのレコード追加のために、DBファサードを利用する */
use Illuminate\Support\Facades\DB;

class MemberSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('member_series')->insert(
            [
                ['member_id' => 1, 'series_id' => 1],
                ['member_id' => 2, 'series_id' => 2],
                ['member_id' => 3, 'series_id' => 2],
                ['member_id' => 2, 'series_id' => 1],
                ['member_id' => 4, 'series_id' => 3],
                ['member_id' => 4, 'series_id' => 2],
                ['member_id' => 4, 'series_id' => 1],

            ]
        );
    }
}
