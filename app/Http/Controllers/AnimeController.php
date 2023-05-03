<?php

namespace App\Http\Controllers;

use App\Http\Filters\AnimeFilter;
use App\Http\Requests\Anime\FilterRequest;
use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index(FilterRequest $request)
    {

        $data = $request->validated();

        $filter = app()->make(AnimeFilter::class, ['queryParams' => array_filter($data)]);

        $animes = Anime::filter($filter)->paginate(4);

        return view('anime.index', compact('animes'));
    }

    public function find()
    {
        $anime = Anime::where('title', $_GET['search'])->first();
        if($anime)
        {
            return view('anime.find', compact('anime'));
        }
        dd('Не найдено');
    }

    public function show(Anime $anime)
    {
        $animes = Anime::limit(4)->get();
        $voiceovers = Anime::find($anime->id)->voiceover;
        return view('anime.show', compact('anime', 'voiceovers', 'animes'));
    }
}
