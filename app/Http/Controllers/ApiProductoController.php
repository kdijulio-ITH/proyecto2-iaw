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

  // public function __construct()
  // {
  //     $this->middleware('auth:api');
  // }
  // 
    public function show(Request $request)
    {
      $prod=DB::table('productos')->get();
      return response()->json($prod);

    }
}
