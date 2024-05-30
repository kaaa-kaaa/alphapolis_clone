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

    public function episode(){
        return $this ->hasMany(Episode::class);
    }

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
}
