<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exame extends Model{

    protected $table = "exame";
    public $timestamps = false;

    protected $fillable = [ 
        "cod_exame", "numero_guia_consulta", "valor_exame",
    ];

}
