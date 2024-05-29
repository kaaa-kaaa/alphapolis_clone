<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    public function episode(){
        return $this ->hasMany(Episode::class);
    }

    public function member(){
        return $this ->belongsTo(Member::class);
    }
}
