<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;
    protected $fillable=[
        'persona_id',
        'telefono',
        'tipo_telefono'
    ];
}
// class Post extends Model
// {
//     /**
//      * Get the comments for the blog post.
//      */
//     public function comments()
//     {
//         return $this->hasMany(Telefonos::class);
//     }
// }
