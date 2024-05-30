<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Series;

class Genre extends Model
{
    use HasFactory;

    public function episodes(){
        return $this ->belongsToMany(Episode::class);
    }

    public function genreSeries(){
        return $this->belongsToMany(Series::class, 'genre_series');
    }
}
