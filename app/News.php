<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
 	protected $fillable = ['title','short_title','description','image'];

 	public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
