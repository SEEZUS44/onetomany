<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Below we doing a mass assignment
    //'It's okay for this field to allow request to add data

    protected $fillable = [
        'title',
        'body'
    ];
}
