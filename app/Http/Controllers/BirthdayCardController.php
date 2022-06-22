<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BirthdayCardController extends Controller
{
      public function firstCard(string $name)
      {
            return view('birthday-card', compact('name'));
      }

      public function secondCard(string $name)
      {
            return view('birthday-card-2', compact('name'));
      }
}
