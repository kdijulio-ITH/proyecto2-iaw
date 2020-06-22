<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model

{
    protected $table = "stock";

    protected $fillable = ['precio','contenido','disponibles','producto_id'];
    //
    // public function get_id(){
    // 	return $this->id;
    // }

//
//     public function articulos(){
//         return $this->hasMany('App\Articulo');
//     }
 }
