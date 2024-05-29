<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/* データベースへのレコード追加のために、DBファサードを利用する */
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert(
            [
                ['name' => 'かにライター', 'email' => 'kani@kanimail.com', 'password' => Hash::make('kani')],
                ['name' => 'I AM 蝉', 'email' => 'semi@semimail.com', 'password' => Hash::make('semi')],
                ['name' => 'ゴーストライター', 'email' => 'obake@obakemail.com', 'password' => Hash::make('obake')],
                ['name' => 'えび', 'email' => 'ebi@ebimail.com', 'password' => Hash::make('ebi')],
                ['name' => 'たこ', 'email' => 'tako@takomail.com', 'password' => Hash::make('tako')],
            ]
        );
    }
}
