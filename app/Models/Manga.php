<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    protected $table = 'mangas';

    public function users() {
        return $this->belongsToMany(User::class,'reads')->withPivot('readStatus','score','favourite');
    }
}
