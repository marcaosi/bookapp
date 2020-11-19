<?php

namespace App\Http\Controllers;

use App\Author;

class AuthorController extends Controller {
    protected $entity = Author::class;
    protected $validations = [
        "name" => "required|string"
    ];
}