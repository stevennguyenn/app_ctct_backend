<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    protected $table = 'counts';

    public $fillable = ['id','name','desc','author'];

    public $hidden = ['created_at', 'updated_at'];

}
