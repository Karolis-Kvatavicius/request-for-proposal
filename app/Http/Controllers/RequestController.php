<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function store(Material $material) {
        ModelsRequest::create([
            'user_id' => Auth::id(),
            'material_id' => $material->id,
            'status' => false
        ]);

        return redirect()->route('dashboard');
    }

    public function update(ModelsRequest $req, Request $request) {

        $req->update(['status' => ($request->grant) ? true : false]);
        return back();
    }

    public function index() {
        return view('admin.requests', ['materials_requests' => ModelsRequest::all()]);
    }
}
