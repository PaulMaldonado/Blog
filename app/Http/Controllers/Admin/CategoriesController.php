<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryForIdRequest;

class CategoriesController extends Controller
{
    protected $model;

    public function __construct(Categories $model)
    {
        $this->middleware('auth');
        $this->model = $model;
    }

    public function index() {
        $categories = $this->model::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request) {
        $params = $request->validated();

        $category = $this->model->create([
            "name" => $params['name']
        ]);

        $category->save();
        return redirect()->route('admin.categories.index')->with('success', 'Categoría creada exitosamente.');
    }

    public function edit($id) {
        $category = $this->model::find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request) {
        $params = $request->validated();

        $category = $this->model::find($params['id']);

        if(!$category) {
            return redirect()->route('admin.categories.index')->with('error', 'La categoría no existe.');
        }

        $category->name = $params['name'];
        $category->save();

        return redirect()->route('admin.categories.index');
    }

    public function delete(CategoryForIdRequest $request) {
        $params = $request->validated();

        $category = $this->model::find($params['id']);
        if(!$category) {
            return redirect()->route('admin.categories.index')->with('error', 'La categoría no existe.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
