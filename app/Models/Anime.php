<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $table = 'animes';

    public function users() {
        return $this->belongsToMany(User::class,'watches')->withPivot('watchStatus','score','favourite');
    }
}
