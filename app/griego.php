<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Griego extends Model
{
  protected $table = 'griegos';

  protected $fillable = [
      'palabra', 'significado'
  ];

  public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
