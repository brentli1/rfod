<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Category as CategoryResource;
use App\Category;

class CategoryController extends Controller
{
    public function adminIndex() {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function edit($id) {
        $category = Category::find($id);

        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function new() {
        $category = new Category();

        return view('admin.categories.new', [
            'category' => $category
        ]);
    }

    public function create(Request $request) {
        $this->validateCategory($request);

        $category = new Category();
        $category = $this->saveCategoryValues($request);

        return redirect()->route('admin.categories.edit', ['id' => $category->id])->with([
            'success' => 'Category Added!'
        ]);
    }

    public function update(Request $request, $id) {
        $this->validateCategory($request);

        $category = Category::find($id);
        $category = $this->saveCategoryValues($request);

        return redirect()->back()->with([
            'success' => 'Category updated!'
        ]);
    }

    public function delete($id) {
        $category = Category::find($id);
        $category->movies()->detach();
        $category->delete();

        return redirect()->route('admin.categories.index')->with([
            'success' => 'Category removed!'
        ]);
    }

    private function validateCategory($request) {
        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);
    }

    private function saveCategoryValues($category, $request) {
        $category->name = $request->name;
        $category->save();

        return $category;
    }
}
