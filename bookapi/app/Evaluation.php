<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model{
    protected $table = "Evaluation";

    protected $fillable = [
        "description",
        "user_id",
        "book_id",
        "stars"
    ];
}