<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $table = 'animes';

     /**
      * Relationship between user and animes
      *
      * @return Illuminate\Database\Eloquent\Model Every user who has seen that anime, with that anime info included
      */
    public function users() {
        return $this->belongsToMany(User::class,'watches')->withPivot('watchStatus','score','favourite');
    }
}
