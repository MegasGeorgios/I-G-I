<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class italian extends Model
{
  protected $table = 'italians';

  protected $fillable = [
      'palabra', 'significado'
  ];

  public function categorias()
    {
        return $this->belongsTo('App\categoria');
    }
}
