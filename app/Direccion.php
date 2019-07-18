<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $fillable = [
        'calle', 'numero','colonia', 'delegacion',
    ];
}
