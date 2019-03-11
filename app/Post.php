<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'image', 'content', 'user_id', 'category_id', 'tag_id', 'slug'];

 

    public function getFeaturedAttribute($image){
    return asset($image);
    }


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
}
