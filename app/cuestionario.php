<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuestionario extends Model
{
  protected $table = 'cuestionarios';

  protected $fillable = [
      'frase', 'sig_frase'
  ];
}
