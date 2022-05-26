<?php

namespace App\Contracts;

interface IPDSDownloadType
{
     public function pdf(string $fileName);
     public function excel(string $id);
}
