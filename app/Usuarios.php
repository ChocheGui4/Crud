<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{

	public function direccion()
	{
   		return $this->belongsTo(Direccion::class);
	}
    protected $fillable = [
        'name', 'apellidos','email', 'password',
    ];
}
