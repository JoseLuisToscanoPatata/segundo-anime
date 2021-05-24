<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    protected $table = 'mangas';

         /**
      * Relationship between user and mangas
      *
      * @return Illuminate\Database\Eloquent\Model Every user who has seen that manga, with that manga info included
      */
    public function users() {
        return $this->belongsToMany(User::class,'reades')->withPivot('readStatus','score','favourite');
    }
}
