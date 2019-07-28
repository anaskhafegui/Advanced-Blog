<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    Public function posts()
    {

        $this->hasMany('App\Post');
    }
}
