<?php

namespace App\Actions;

use App\PersonnelFile;
use Illuminate\Http\JsonResponse;
use Lorisleiva\Actions\Concerns\AsAction;
use App\Http\Requests\PersonnelFileUpdateRequest;

final class UpdatePersonnelFile
{
    use AsAction;

    public function handle(int $id, array $data = [])
    {
        $file = PersonnelFile::find($id);
        $file->name = $data['edit_file'];
        $file->save();
    }


    public function asApi(PersonnelFileUpdateRequest $request, int $id) :JsonResponse
    {
        $this->handle($id, $request->all());
        return response()->json(['success' => true]);
    }
}
