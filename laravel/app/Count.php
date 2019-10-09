<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    protected $table = 'counts';

    protected $fillable = [
    	'id','name','desc','author'
    ];

    protected $hidden = [

    ];
}
