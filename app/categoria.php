<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
  protected $table = 'categorias';

  protected $fillable = [
      'nombre_categoria'
  ];
  public function idioma()
  {
    return $this->hasMany('App\italian','App\griego','App\ingles');
  }
}
