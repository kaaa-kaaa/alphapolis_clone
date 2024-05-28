<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
                ['name'=>'ファンタジー'],
                ['name'=>'恋愛'],
                ['name'=>'ミステリー'],
                ['name'=>'ホラー'],
                ['name'=>'SF'],
                ['name'=>'キャラ文芸'],
                ['name'=>'ライト文芸'],
                ['name'=>'青春'],
                ['name'=>'現代文学'],
                ['name'=>'大衆娯楽'],
                ['name'=>'経済・企業'],
                ['name'=>'歴史・時代'],
                ['name'=>'児童書・童話'],
                ['name'=>'絵本'],
                ['name'=>'BL'],
                ['name'=>'エッセイ'],
            ]);
    }
}
