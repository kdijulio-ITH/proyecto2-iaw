<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use User;
use Auth;
use DB;
use App\Producto;

class HomeController extends Controller
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
    public function index()
    {
        $user=Auth::user();
        // dd($user);
        return view('home')->with('user', $user);;





    }

}
