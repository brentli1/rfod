<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Category as CategoryResource;
use App\Category;

class CategoryController extends Controller
{
    public function apiCategories() {
        return CategoryResource::collection(Category::all());
    }
}
