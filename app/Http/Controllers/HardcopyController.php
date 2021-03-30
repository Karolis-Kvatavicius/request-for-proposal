<?php

namespace App\Http\Controllers;

use App\Models\Hardcopy;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class HardcopyController extends Controller
{
    public function store(ModelsRequest $req) {
        Hardcopy::create([
            'material_id' => $req->material_id,
            'taken' => now(),
            'return' => null,
            'deadline' => now()->addMonths(3),
        ]);

        // $req->delete();

        return back();
    }
}
