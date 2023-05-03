<?php

namespace App\Http\Controllers\API\Anime;

use App\Http\Controllers\Controller;
use App\Http\Filters\AnimeFilter;
use App\Http\Requests\API\Anime\FilterRequest;
use App\Http\Resources\Anime\AnimeResource;
use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    public function index(FilterRequest $request)
    {

        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(AnimeFilter::class, ['queryParams' => array_filter($data)]);

        $animes = Anime::filter($filter)->paginate($perPage, ['*'], 'page', $page);

        return AnimeResource::collection($animes);
    }

    public function show(Anime $anime)
    {
        return new AnimeResource($anime);
    }
}
