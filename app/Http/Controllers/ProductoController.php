<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Auth;
use DB;
use App\Producto;
use App\Stock;
use Image;

class ProductoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function registrar_producto()
    {
        return view('crearproducto');
    }

    protected function registrar_producto_BD(Request $request)
    {
    
      if($request->hasFile('imagen')){
      $avatar=$request->file('imagen');
      $filename=time() . '.' . $avatar->getClientOriginalExtension();
      $path = public_path('storage')."/".$filename;
      Image::make($avatar->getRealPath())->resize(250,250)->save($path);

       $producto = Producto::create([
            'nombre' => $request['nombre'],
            'descripcion' => $request['descripcion'],
            'creador' => $request['creador'],
            'imagen' => $filename
        ]);
      }
      // dd($producto->id);

       $precio = $request->precio;
       $contenido = $request->contenido;
       $disponibles = $request->disponibles;
       for($count = 1; $count < count($precio)+1; $count++)
       {


         $stock = Stock::create([
              'precio' => $precio[$count],
              'contenido' => $contenido[$count],
              'disponibles' => $disponibles[$count],
              'producto_id' => $producto->id
         ]);

       }

      return view('home');

    }

}
