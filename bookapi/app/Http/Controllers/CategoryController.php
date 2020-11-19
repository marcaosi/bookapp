<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller {
    protected $entity = Category::class;
    protected $validations = [
        "name" => "required|string"
    ];
}