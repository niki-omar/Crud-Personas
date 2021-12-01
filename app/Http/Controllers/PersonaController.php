<?php

namespace App\Http\Controllers;

use App\Models\Persona;use App\Models\Telefono;
use Illuminate\Http\Request;
// use app\Htpp\Requests\PersonaRequest;
use \app\Http\Requests\PersonaRequest;
class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Persona::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {//borrando PersonaRequest y dejando solo Request el codigo funciona
        $request ->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'cedula'=>'required',
            'correo'=>'required',
        ]);
        $persona= new Persona;
        $persona -> create($request ->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        $persona->load('telefonos');
        return $persona;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Persona $persona)
    {  //borrando PersonaRequest y dejando solo Request el codigo funciona
        $request ->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'cedula'=>'required',
            'correo'=>'required',
        ]);
        $persona -> update($request ->all());
        // return $request;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $this->borrarTelefono($persona->id);
        // return $persona;
        $persona->delete();

        // return $persona->;
        // $this->borrarTelefono(persona_id);
    }
    public function borrarTelefono($persona_id){
        $telefonos = Telefono::where('persona_id', $persona_id)
        ->delete();
    }
}
