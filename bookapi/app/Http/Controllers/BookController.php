<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends Controller {
    protected $entity = Book::class;
    protected $validations = [
        "name" => "required|string",
        "description" => "required|string",
        "pages" => "required|string",
        "author_id" => "required|integer",
        "category_id" => "required|integer",
    ];
}