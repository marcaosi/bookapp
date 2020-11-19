<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model{
    protected $table = "Book";

    protected $fillable = [
        "author_id",
        "category_id",
        "name",
        "description",
        "pages"
    ];
}