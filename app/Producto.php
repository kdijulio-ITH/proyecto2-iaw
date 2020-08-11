<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model

{
    protected $table = "productos";

    protected $fillable = ['nombre','descripcion','creador','imagen','precio','cantidad'];
    //
    // public function get_id(){
    // 	return $this->id;
    // }

//
//     public function articulos(){
//         return $this->hasMany('App\Articulo');
//     }
 }
