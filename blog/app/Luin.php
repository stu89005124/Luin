<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Luin extends Model
{
    protected $table ='member';
    // public $timestamps = false;
    protected $fillable = [
        'name','email','telephone','cellphone','sex'
    ];    
}
