<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingles extends Model
{
  protected $table = 'ingles';

  protected $fillable = [
      'palabra', 'significado'
  ];

  public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
