<?php

namespace App\Http\Controllers;

use App\Service\Admin\Anime\Service;

class BaseController extends Controller
{
    public $adminAnimeService;

    public function __construct(Service $adminAnimeService, VoiceoversSerivce $adminVoiceoversService)
    {
        $this->adminAnimeService = $adminAnimeService;
    }
}
