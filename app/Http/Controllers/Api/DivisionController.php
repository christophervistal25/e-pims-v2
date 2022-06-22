<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DivisionService;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
      public function __construct(public DivisionService $divisionService)
      {
      }

      public function getDivisions(string $office)
      {
            return response()->json(['divisions' => $this->divisionService->getDivisionByOffice($office)]);
      }
}
