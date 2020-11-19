<?php

namespace App\Http\Controllers;

use App\Evaluation;

class EvaluationController extends Controller {
    protected $entity = Evaluation::class;
    protected $validations = [
        "user_id" => "required|integer",
        "book_id" => "required|integer",
        "description" => "required|string"
    ];
}