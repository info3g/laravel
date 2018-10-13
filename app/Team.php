<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
    	'employe_name',
    	'image',
    	'position'
    ];
}
