<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;
    public $timestamps = false; //Desactivandola columna update_at y creat_at
    //Definir los campos de la tabla contactos
    protected $fillabel = ['nombre','telefono','correo'];
}
