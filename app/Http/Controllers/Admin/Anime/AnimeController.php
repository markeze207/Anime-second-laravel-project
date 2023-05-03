<?php

namespace App\Http\Controllers\Admin\Anime;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Anime\StoreRequest;
use App\Http\Requests\Admin\Anime\UpdateRequest;
use App\Models\Anime;
use App\Models\User;
use App\Models\Voiceover;

class AnimeController extends BaseController
{
    public function index()
    {
        $animes = Anime::paginate(10);

        return view('admin.anime.index', compact('animes'));
    }

    public function create()
    {
        $voiceovers = Voiceover::all();

        return view('admin.anime.create', compact('voiceovers'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->adminAnimeService->store($data);

        return redirect()->route('admin.anime.index');
    }

    public function edit(Anime $anime)
    {
        $voiceovers = Voiceover::all();

        return view('admin.anime.edit', compact('anime', 'voiceovers'));
    }

    public function update(UpdateRequest $request, Anime $anime)
    {
        $data = $request->validated();

        $this->adminAnimeService->update($data, $anime);

        return redirect()->route('admin.anime.index');
    }

    public function destroy(Anime $anime) {

        $anime->delete();

    }
}
