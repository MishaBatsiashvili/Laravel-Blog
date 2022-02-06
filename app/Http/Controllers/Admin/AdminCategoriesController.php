<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index(){
        return view('admin.categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function getValidation(){
        return [
            'name' => 'string|max:100',
            'slug' => 'string|max:100'
        ];
    }

    public function generateSlug($startStr){
        return implode("-", explode(" ", $startStr));
    }

    public function store(Request $request){
        $attributes = $request->validate($this->getValidation());
        $attributes['slug'] = $this->generateSlug($attributes['slug']);

        Category::create($attributes);

        return redirect(route('admin.categories.index'));
    }

    public function edit(Category $category){
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category){
        $attributes = $request->validate($this->getValidation());
        $attributes['slug'] = $this->generateSlug($attributes['slug']);
        $category->update($attributes);

        return redirect(route('admin.categories.index'));
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect(route('admin.categories.index'));
    }
}
