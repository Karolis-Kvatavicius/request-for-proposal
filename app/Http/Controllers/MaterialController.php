<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Material;
use App\Models\Type;
use Illuminate\Http\Request;

class MaterialController extends Controller
{

    public function index() {
        $materials = Material::all();
        $types = Type::all();
        $categories = Category::all();

        return view('admin.dashboard', [
            'materials' => $materials,
            'types' => $types,
            'categories' =>$categories
        ]);
    }

    public function userIndex() {
        $materials = Material::all();
        $types = Type::all();
        $categories = Category::all();

        return view('dashboard', [
            'materials' => $materials,
            'types' => $types,
            'categories' =>$categories
        ]);
    }

    public function store(Request $request) {
        Material::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'link_to_material' => $request->link_to_material 
        ]);

        return redirect()->route('admin.dashboard');
    }
}
