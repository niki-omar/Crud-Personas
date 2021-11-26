<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // Viniendo de web.php, que es donde se guardan las rutas. como se explicaba esta nos mandaba
        //al index. aqui le decimos al programa que nos retorne la vista "home".
        // almacenada en views/home. no se toma en cuenta el .blade.php
        return view('home');
    }
}
