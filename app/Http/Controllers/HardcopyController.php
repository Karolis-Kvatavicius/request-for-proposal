<?php

namespace App\Http\Controllers;

use App\Models\Hardcopy;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class HardcopyController extends Controller
{
    public function store(ModelsRequest $req) {
        Hardcopy::create([
            'user_id' => $req->user_id,
            'material_id' => $req->material_id,
            'taken' => now(),
            'return' => null,
            'deadline' => now()->addMonths(3),
        ]);

        // $req->delete();

        return back();
    }

    public function index() {
        return view('admin.hardcopies', ['hardcopies' => Hardcopy::all()]);
    }

    public function return(Hardcopy $hardcopy) {
        
    }
}
