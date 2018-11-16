<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Luin extends Model
{
    protected $table ='name';
    // protected $table ='reserve';
    // protected $table ='tent';
    protected $fillable = [
        'name'
    ];    
}
