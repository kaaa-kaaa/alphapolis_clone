<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

        /* episodes テーブルとのリレーション設定 */
        public function episodes(){

            return $this->hasMany(Episode::class);
        }

}
