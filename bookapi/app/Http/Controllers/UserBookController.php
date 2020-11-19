<?php

namespace App\Http\Controllers;

use App\UserBook;

class UserBookController extends Controller {
    protected $entity = UserBook::class;
    protected $validations = [
        "user_id" => "required|integer",
        "book_id" => "required|integer"
    ];
}