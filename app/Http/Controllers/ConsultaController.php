<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;

class ConsultaController extends Controller{
    
    public function index(){
        $medicos = App\Consulta::groupBy('nome_medico')->select('nome_medico as nome')->get();
        return view('consultas/index', compact('medicos'));
    }
    
    public function list(Request $request){
        $data = $request->all();
        $consultas = new App\Consulta;

        if(isset($data['nomeMedico']) && $data['nomeMedico'])
            $consultas = $consultas->whereIn('nome_medico', $data['nomeMedico']);

        if(isset($data['de']) && $data['de'])
            $consultas = $consultas->where('data_consulta','>=',implode('-', array_reverse(explode('/', $data['de']))));

        if(isset($data['ate']) && $data['ate'])
            $consultas = $consultas->where('data_consulta','<=',implode('-', array_reverse(explode('/', $data['ate']))));

        $consultas = $consultas->join('exame','exame.numero_guia_consulta','=','consulta.numero_guia_consulta');
        $consultas->select('consulta.*', DB::raw("SUM(exame.valor_exame) as gasto_consulta"));
        $consultas->groupBy('consulta.numero_guia_consulta');
        $consultas->orderBy('gasto_consulta');
        $consultas = $consultas->paginate(10);
        return view('consultas/table',compact('consultas'));
    }
}
