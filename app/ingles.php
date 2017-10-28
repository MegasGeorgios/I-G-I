<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ingles extends Model
{
  protected $table = 'ingles';

  protected $fillable = [
      'palabra', 'significado'
  ];

  public function categorias()
    {
        return $this->belongsTo('App\categoria');
    }
}
