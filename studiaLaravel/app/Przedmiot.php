<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Przedmiot extends Model
{
    protected $fillable = ['id', 'nazwa', 'godzin'];
    protected $table = 'przedmiots';
    public $timestamps = false;
}
