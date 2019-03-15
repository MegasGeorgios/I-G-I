<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tablas extends Model
{
    protected $table = 'tablas';

	protected $fillable = [
	  'titulo', 'filas', 'columnas', 'datos'
	];

	public function categoria()
	{
	    return $this->belongsTo('App\Categoria');
	}
}
