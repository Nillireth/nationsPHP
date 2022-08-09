<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
        //La tabla a conectar a este modelo.
        protected $table = "languages";

        //La clave primaria de esa tabla.
        protected $primaryKey = "language_id";
    
        //omitir campos de auditoria.
        public $timestamps = false;
    use HasFactory;

        //Relacion M:M entre idioma y paises
        public function paises(){
            //belongsToMany : parametros
            //1. Modelo a relacionar
            //2. La tabla pivote  
            //3. FK del modelo actual en el pivote
            //4. FK del modelo a relacionar en el pivote
            return $this->belongsToMany(Country::class,
                                         'country_languages',
                                         'language_id',
                                         'country_id');
    
        }
}
