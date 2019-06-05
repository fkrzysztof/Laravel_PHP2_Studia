<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocena extends Model
{
    protected $fillable = ['id', 'imie', 'nazwisko', 'przedmiot', 'ocena'];
    protected $table = 'oceny';
    public $timestamps = false;
}
