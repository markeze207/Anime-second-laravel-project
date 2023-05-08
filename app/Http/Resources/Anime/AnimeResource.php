<?php

namespace App\Http\Resources\Anime;

use App\Http\Resources\Episodes\EpisodesResource;
use App\Http\Resources\Voiceovers\VoiceoversResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AnimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "likes" => $this->likes,
            "views" => $this->views,
            "voiceovers" => $this->voiceover,
            "episodes" => $this->episodes->count(),
        ];
    }
}
