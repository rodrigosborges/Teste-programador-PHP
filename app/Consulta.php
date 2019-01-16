<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model{

    protected $table = "consulta";
    public $timestamps = false;

    protected $fillable = [
        "numero_guia_consulta", "cod_medico", "nome_medico", "data_consulta", "valor_consulta",
    ];

}
