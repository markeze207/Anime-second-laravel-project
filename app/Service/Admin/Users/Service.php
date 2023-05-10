<?php

namespace App\Service\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{

    public function update($data, $user)
    {
        try {
            Db::beginTransaction();

            $user->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return true;
    }
}
