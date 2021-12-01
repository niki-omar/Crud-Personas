<?php

namespace App\Http\Controllers;

use App\Models\Telefono;
use Illuminate\Http\Request;
class TelefonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Telefono::get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'telefono'=>'required',
            'tipo_telefono'=>'required',
        ]);
        $telefono= new Telefono;
        $telefono -> create($request ->all());
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $telefonos = Telefono::where('persona_id', $id)
                    ->get()
                    ->all();
        return $telefonos;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Telefono $telefono)
    {
        $telefono -> update($request ->all());
    }
    /**
     * Remove the specified resource from storage.
     *
     *
     * 
     * @param  \App\Models\Telefono  $telefono
     * @return \Illuminate\Http\Response
     */
    public function destroy(Telefono $telefono)
    {
        $telefono->delete();
    }
}
