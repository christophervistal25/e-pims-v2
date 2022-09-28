<?php

namespace App\Actions;

use App\PersonnelFile;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Http\Requests\PersonnelFileStoreRequest;

final class StorePersonnelFile
{
    use AsAction;

    public function handle(array $data = [])
    {
        PersonnelFile::create(['name' => $data['file']]);
    }

    public function asApi(PersonnelFileStoreRequest $request) :JsonResponse
    {
        $this->handle($request->all());
        return response()->json(['success' => true]);
    }
}
