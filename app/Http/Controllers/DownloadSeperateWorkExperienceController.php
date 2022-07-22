<?php

namespace App\Http\Controllers;

class DownloadSeperateWorkExperienceController extends Controller
{
    public function excel(string $id)
    {
        return response()->download(storage_path().'\\generated_pds\\'.$id.'-WORK_EXPERIENCE.xls');
    }
}
