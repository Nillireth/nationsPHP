<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //La tabla a conectar a este modelo.
    protected $table = "continents";

    //La clave primaria de esa tabla.
    protected $primaryKey = "continent_id";

    //omitir campos de auditoria.
    public $timestamps = false;

    use HasFactory;

    //Relación entre continente y región
    public function regiones(){
        //hasMany: Parametros
        //1. El modelo a relacionar
        //2. La FK del modelo actual en el modelo a relacionar
        return $this->hasMany(Region::class , 
                              'continent_id');
    }

    //Relación entre continente y sus pasises
    //Abuelo: Continent
    //Papá: Region
    //Nieto: Country
    public function paises(){
        //hasManyThrough: parametros
        //1. Modelo Nieto
        //2. Modelo Papá
        //3. FK del abuelo en el papá
        //4. FK del papá en el nieto
        return $this->hasManyThrough(Country::class,
                                    Region::class,
                                    'continent_id', 
                                    'region_id');
    }
}
