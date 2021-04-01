<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RandUserApiController extends Controller
{
    public function index() {
        $randUser = Http::get('https://randomuser.me/api/')->collect();
        // dd($randUser);
        return view('welcome', ['randUser' => $randUser]);
    }
}
