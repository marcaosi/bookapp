<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model{
    protected $table = "Review";

    protected $fillable = [
        "description",
        "user_id",
        "book_id"
    ];
}