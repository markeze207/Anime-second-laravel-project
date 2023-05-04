<?php

namespace App\Repositories\Admin;

use App\Repositories\Admin\Interfaces\AnimeRepositoryInterface;
use App\Models\Anime;

class AnimeRepository implements AnimeRepositoryInterface
{
    public function getAnimeCount()
    {
        return Anime::count();
    }
}
