<?php

namespace App\Http\Controllers\Admin\Anime;

use App\Http\Requests\Admin\Anime\StoreRequest;
use App\Http\Requests\Admin\Anime\UpdateRequest;
use App\Service\Admin\Anime\Service;
use App\Models\Anime;
use App\Models\Voiceover;
use App\Http\Controllers\Controller;


class AnimeController extends Controller
{

    protected $admieAnimeService;

    /**
     * Get service
     */
    public function __construct(Service $admieAnimeService)
    {
        $this->admieAnimeService = $admieAnimeService;
    }

    /**
     * Show the anime list
     */
    public function index()
    {
        $animes = Anime::paginate(10);

        return view('admin.anime.index', compact('animes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $voiceovers = Voiceover::all();

        return view('admin.anime.create', compact('voiceovers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->adminAnimeService->store($data);

        return redirect()->route('admin.anime.index');
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Anime $anime)
    {
        $voiceovers = Voiceover::all();

        return view('admin.anime.edit', compact('anime', 'voiceovers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Anime $anime)
    {
        $data = $request->validated();

        $this->adminAnimeService->update($data, $anime);

        return redirect()->route('admin.anime.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime $anime) {

        $anime->delete();

    }
}
