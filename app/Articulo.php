<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';

    public function categoria(){
    	return $this->belongsTo('App\Categoria');
    }
}
