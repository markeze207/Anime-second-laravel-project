<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiceover extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Return the voiceover anime
     */
    public function animes()
    {
        return $this->belongsToMany(Anime::class);
    }
}
