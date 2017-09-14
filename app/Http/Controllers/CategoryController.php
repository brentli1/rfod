<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Category as CategoryResource;
use App\Category;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /**
     * Fetch all categories and show categories index view.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex() {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Fetch category and show categories edit view.
     *
     * @param  int $id ID for the requested category.
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $category = Category::find($id);

        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Instantiate new category model and show category new view.
     *
     * @return \Illuminate\Http\Response
     */
    public function new() {
        $category = new Category();

        return view('admin.categories.new', [
            'category' => $category
        ]);
    }

    /**
     * Create new Category and redirect to Category view.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request) {
        $this->validateCategory($request);

        $category = new Category();
        $category = $this->saveCategoryValues($request);

        return redirect()->route('admin.categories.edit', ['id' => $category->id])->with([
            'success' => 'Category Added!'
        ]);
    }

    /**
     * Update existing Category with modified values.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id ID of the Category to update.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id) {
        $this->validateCategory($request);

        $category = Category::find($id);
        $category = $this->saveCategoryValues($request);

        return redirect()->back()->with([
            'success' => 'Category updated!'
        ]);
    }

    /**
     * Delete the requested Category and remove Movie associations.
     *
     * @param  int $id ID of the Category for deletion.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id) {
        $category = Category::find($id);
        $category->movies()->detach();
        $category->delete();

        return redirect()->route('admin.categories.index')->with([
            'success' => 'Category removed!'
        ]);
    }

    /**
     * Validate the Category request.
     *
     * @param \Illuminate\Http\Request $request
     * @return void|array Returns array of errors if validation errors present.
     */
    private function validateCategory($request) {
        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);
    }

    /**
     * Save Category values.
     *
     * @param  App\Category $category
     * @param  \Illuminate\Http\Request $request
     * @return App\Category
     */
    private function saveCategoryValues($category, $request) {
        $category->name = $request->name;
        $category->save();

        return $category;
    }
}
