<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;
    use Filterable;

    protected $guarded = [];

    public function voiceover()
    {
        return $this->belongsToMany(Voiceover::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
