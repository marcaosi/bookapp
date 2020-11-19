<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model{
    protected $table = "Author";

    protected $fillable = [
        "name"
    ];
}