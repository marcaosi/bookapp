<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller {
    protected $entity = User::class;
    protected $validations = [
        "name" => "required|string",
        "email" => "required|string",
        "password" => "required|string"
    ];
}