<?php

namespace App\Contracts;

interface IDownloadType
{
     public function pdf(string $fileName);
     public function excel(string $id);
}
