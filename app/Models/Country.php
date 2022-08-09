<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //La tabla a conectar a este modelo.
    protected $table = "countries";

    //La clave primaria de esa tabla.
    protected $primaryKey = "country_id";

    //omitir campos de auditoria.
    public $timestamps = false;

    use HasFactory;

    //Relacion M:M entre paises e idiomas
    public function idiomas(){
        //belongsToMany : parametros
        //1. Modelo a relacionar
        //2. La tabla pivote  
        //3. FK del modelo actual en el pivote
        //4. FK del modelo a relacionar en el pivote
        return $this->belongsToMany(Idioma::class,
                                     'country_languages',
                                     'country_id',
                                     'language_id')->withPivot('official');

    }
}
