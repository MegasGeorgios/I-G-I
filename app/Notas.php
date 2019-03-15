<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
	protected $table = 'notas';

	protected $fillable = [
	  'nota'
	];

	public function categoria()
	{
	    return $this->belongsTo('App\Categoria');
	}
}
