<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Repositories\Admin\AnimeRepository;

class AdminComposer
{

    protected AnimeRepository $anime;

    public function __construct(AnimeRepository $anime)
    {
        // Dependencies automatically resolved by service container...
        $this->anime = $anime;
    }

    public function compose(View $view)
    {
        $view->with('animeCount', $this->anime->getAnimeCount());
    }

}
