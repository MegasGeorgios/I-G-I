<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class griego extends Model
{
  protected $table = 'griegos';

  protected $fillable = [
      'palabra', 'significado'
  ];

  public function categorias()
    {
        return $this->belongsTo('App\categoria');
    }
}
