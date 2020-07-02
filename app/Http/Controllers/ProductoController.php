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

    public function modificar_producto(Request $request)
    {
        $prod=DB::table('productos')->where('id','=',$request->id_prod)->first();
        $data = array('user' => Auth::user(),
                      'producto' => $prod);
        return view('modificarproducto', $data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:2'],
            'descripcion' => ['required', 'string', 'max:255'],
            'creador' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function vender_producto(Request $request)
    {
      $user=Auth::user();
      $stock=DB::table('stock')->where('id','=',$request->id_item)->first();
      $disponibles=$stock->disponibles-1;
      DB::table('stock')->where('id','=',$request->id_item)->update(['disponibles' => $disponibles]);
      $user=Auth::user();
      // dd($user);
      return view('home')->with('user', $user);


    }

    protected function modificar_producto_BD(Request $request)
    {

      if($request->hasFile('imagen')){
        $avatar=$request->file('imagen');
        $filename=time() . '.' . $avatar->getClientOriginalExtension();
        $path = public_path('storage')."/".$filename;
        Image::make($avatar->getRealPath())->resize(250,250)->save($path);

      }
      DB::table('productos')->where('id','=',$request['id_prod'])->update(['nombre' => $request['nombre']]);
      DB::table('productos')->where('id','=',$request['id_prod'])->update(['descripcion' => $request['descripcion']]);
      DB::table('productos')->where('id','=',$request['id_prod'])->update(['creador' => $request['creador']]);


      $id_stock = $request->id_stock;
      $precio = $request->precio;
      $contenido = $request->contenido;
      $disponibles = $request->disponibles;
      // dd($id_stock);
      for($count = 1; $count < count($precio)+1; $count++)
      {

        if($id_stock[$count] == -1){
            $stock = Stock::create([
                 'precio' => $precio[$count],
                 'contenido' => $contenido[$count],
                 'disponibles' => $disponibles[$count],
                 'producto_id' => $request['id_prod']
            ]);
        }else{
            DB::table('stock')->where('id','=',$id_stock[$count])->update(['precio' => $precio[$count]]);
            DB::table('stock')->where('id','=',$id_stock[$count])->update(['contenido' => $contenido[$count]]);
            DB::table('stock')->where('id','=',$id_stock[$count])->update(['disponibles' => $disponibles[$count]]);
        }
      }


       $user=Auth::user();
       return view('home')->with('user', $user);

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
       $user=Auth::user();
       return view('home')->with('user', $user);

    }

    public function show($id)
   {
       //
   }


}
