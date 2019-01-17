<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

class ConsultaController extends Controller{
    public function pesquisar(Request $request){
        $data = $request->all();
        $consultas = new App\Consulta;

        if($data['nomeMedico'])
            $consultas = $consultas->where('nome_medico','LIKE', '%'.$data['nomeMedico'].'%');
        if($data['periodo'])
            $consultas = $consultas->where('data_consulta',implode('-', array_reverse(explode('/', $data['periodo']))));

        $consultas = $consultas->join('exame','exame.numero_guia_consulta','=','consulta.numero_guia_consulta');
        $consultas->select('consulta.*', DB::raw("SUM(exame.valor_exame) as gasto_consulta"));
        $consultas->groupBy('consulta.numero_guia_consulta');
        $consultas->orderBy('gasto_consulta');
        $consultas = $consultas->paginate(10);
        return view('consultas/table',compact('consultas'));
    }
}
