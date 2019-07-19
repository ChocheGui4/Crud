<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{

	public function usuarios(){
		return $this->hasMany(Usuarios::class);
	}
    protected $fillable = [
        'calle', 'numero','colonia', 'delegacion','usuarios_id'
    ];
}
