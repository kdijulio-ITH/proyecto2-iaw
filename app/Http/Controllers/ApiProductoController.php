<?php
namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Producto;
use App\Stock;
use Image;
use Illuminate\Support\Facades\Storage;

class ApiProductoController extends Controller
{

  public function __construct()
  {
      $this->middleware('api');
  }

    public function showPerfumes(Request $request)
    {

      $request->validate([
          'email'       => 'required|string|email',
          'password'    => 'required|string',
          'remember_me' => 'boolean',
      ]);
      $credentials = request(['email', 'password']);
      if (!Auth::attempt($credentials)) {
          return response()->json([
              'message' => 'Unauthorized'], 401);
      }
      $prod=DB::table('productos')->get();
      return response()->json($prod);

    }

    public function showStock(Request $request)
    {

      $request->validate([
          'email'       => 'required|string|email',
          'password'    => 'required|string'
      ]);
      $credentials = request(['email', 'password']);
      if (!Auth::attempt($credentials)) {
          return response()->json([
              'message' => 'Unauthorized'], 401);
      }
      $stock=DB::table('stock')->where('producto_id','=',request(['producto_id']))->get();
      return response()->json($stock);

    }
}
