<?php

namespace App\Http\Controllers;

use App\Http\Filters\MaterialFilter;
use App\Models\Category;
use App\Models\Material;
use App\Models\Type;
use Illuminate\Http\Request;

class MaterialController extends Controller
{

    public function index()
    {
        $materials = Material::all();
        $types = Type::all();
        $categories = Category::all();

        return view('admin.dashboard', [
            'materials' => $materials,
            'types' => $types,
            'categories' => $categories
        ]);
    }

    public function userIndex()
    {
        $materials = Material::all();
        $types = Type::all();
        $categories = Category::all();

        return view('dashboard', [
            'materials' => $materials,
            'types' => $types,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        Material::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'link_to_material' => $request->link_to_material
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function filter(Request $request)
    {
        // dd($request->url());
        $filtered_materials = Material::withCount('requests');

        if ($request->type) {
            $filtered_materials->where('type_id', $request->type);
        }

        if ($request->category) {
            $filtered_materials->where('category_id', $request->category);
        }

        if ($request->date_to) {
            $filtered_materials->where('created_at', '<=', $request->date_to);
        }

        if ($request->date_from) {
            $filtered_materials->where('created_at', '>=', $request->date_from);
        }

        if ($request->most_popular) {
            $filtered_materials->orderBy('requests_count', 'desc');
        }

        $types = Type::all();
        $categories = Category::all();

        $view = 'dashboard';
        
        if ($request->route()->uri === 'admin-dashboard') {
            $view = 'admin.dashboard';
        }

        return view($view, [
            'materials' => $filtered_materials->get(),
            'types' => $types,
            'categories' => $categories
        ]);
    }
}
