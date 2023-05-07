<?php

namespace App\Service\Admin\Voiceovers;

use App\Models\Voiceover;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data)
    {
        try {
            Db::beginTransaction();

            Voiceover::create($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return true;
    }

    public function update($data, $voiceover)
    {
        try {
            Db::beginTransaction();

            $voiceover->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return true;
    }
}
