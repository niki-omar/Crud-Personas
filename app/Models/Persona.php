<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Telefono;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    protected $table='personas';
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
    public function telefonos(){
        return $this -> hasMany('app\Models\Telefono');
    }
}
