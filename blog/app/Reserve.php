<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $table ='reserve';
    // public $timestamps = false;
    protected $fillable = [
        'tentid','memberid','quality','price','startdate','enddate'
    ];    
}
