<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Italiano extends Model
{
  protected $table = 'italianos';

  protected $fillable = [
      'palabra', 'significado'
  ];

  public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
