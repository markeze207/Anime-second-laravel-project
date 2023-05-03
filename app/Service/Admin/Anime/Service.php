<?php

namespace App\Service\Admin\Anime;

use App\Models\Anime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data)
    {
        try {
            Db::beginTransaction();

            $photoPut = Storage::put('public/images/', $data['preview_photo']);
            $data['preview_photo'] = Storage::url($photoPut);

            $voiceovers = $data['voiceovers'];
            unset($data['voiceovers']);

            $anime = Anime::create($data);

            $anime->voiceover()->attach($voiceovers);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return true;
    }

    public function update($data, Anime $anime) {

        if(isset($data['preview_photo']))
        {
            $photoPut = Storage::put('public/images/', $data['preview_photo']);
            $data['preview_photo'] = Storage::url($photoPut);
        }

        $voiceovers = $data['voiceovers'];
        unset($data['voiceovers']);

        $anime->update($data);
        $anime->voiceover()->sync($voiceovers);
    }
}
