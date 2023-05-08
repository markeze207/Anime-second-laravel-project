<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Return the episodes anime
     */
    public function animes()
    {
        return $this->hasMany(Anime::class);
    }
}
