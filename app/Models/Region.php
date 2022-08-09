<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
        //La tabla a conectar a este modelo.
        protected $table = "regions";

        //La clave primaria de esa tabla.
        protected $primaryKey = "region_id";
    
        //omitir campos de auditoria.
        public $timestamps = false;

    use HasFactory;

    //Relacion entre regiones y continente
    public function continente(){
        //belongsTo: Parametros
        //1. El modelo a relacionar
        //2. La FK del modelo a relacionar en el modelo actual
        return $this->belongsTo(Continent::class, 
                                 'continent_id' );
    }

    //Relacion entre region 1 - M paises
    public function paises(){
        //hasMany: Parametros
        //1. El modelo a relacionar
        //2. La FK del modelo actual en el modelo a relacionar
        return $this->hasMany(Country::class,
                              'region_id');
    }
}
