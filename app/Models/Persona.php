<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Telefono;

class Persona extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'apellido',
        'cedula',
        'correo',
        'direccion',
        'sexo',
        'descripcion',
    ];
    //RELACION DE UNO A MUCHOS CON HASMANY
    public function post(){
        return $this -> hasMany('app\Models\Telefono');
    }
}
