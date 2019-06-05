<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //protected $attributes = ['imie', 'nazwisko'];
    protected $fillable = ['id', 'imie', 'nazwisko'];
    protected $table = 'studenci';
    public $timestamps = false;
}
