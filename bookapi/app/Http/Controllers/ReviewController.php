<?php

namespace App\Http\Controllers;

use App\Review;

class ReviewController extends Controller {
    protected $entity = Review::class;
    protected $validations = [
        "user_id" => "required|integer",
        "book_id" => "required|integer",
        "description" => "required|string"
    ];
}