<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Category as CategoryResource;
use App\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function show($id) {
        $category = Category::find($id);

        return view('admin.categories.show', [
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
        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories.show', ['id' => $category->id])->with([
            'success' => 'Category Added!'
        ]);
    }

    public function edit(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

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
}
