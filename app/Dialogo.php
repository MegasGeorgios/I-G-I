<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dialogo extends Model
{
  protected $fillable = [
    'titulo',
    'dialogo',
    'idioma'
  ];
}
