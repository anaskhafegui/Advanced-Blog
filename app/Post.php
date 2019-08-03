<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'featured', 'content','category_id','slug'
    ];
   
    public function getFeaturedAttribute($featured){

        return asset($featured);
    }
    protected $dates = ['deleted_at'];

    Public function category(){

        return $this->belongsTo('App\Category');
    }
    Public function tags(){

      return  $this->belongsToMany('App\Tag');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
