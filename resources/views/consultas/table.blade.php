<p>{{$consultas->total()}} Registro(s) encontrado(s).</p>
@if ($consultas->count())
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nome do Médico</th>
                <th>Número da Guia</th>
                <th>Data da Consulta</th>
                <th>Valor da Consulta</th>
                <th>Gasto por Consulta</th>
                <th>Quantidade de Exames</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                <tr>
                    <td>{{$consulta->nome_medico}}</td>
                    <td>{{$consulta->numero_guia_consulta}}</td>
                    <td>{{$consulta->data_consulta}}</td>
                    <td>{{ number_format($consulta->valor_consulta, 2, ',', ' ') }}</td>
                    <td>{{ number_format($consulta->gasto_consulta, 2, ',', ' ') }}</td>
                    <td>{{$consulta->exames()->count() }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="100%" class="text-center">
                    <p class="text-center">
                        Página {{$consultas->currentPage()}} de {{$consultas->lastPage()}}
                        - Exibindo {{$consultas->perPage()}} registro(s) por página de {{$consultas->total()}}
                        registro(s) no total
                    </p>
                    </td>     
                </tr>
                @if($consultas->lastPage() > 1)
                <tr>
                    <td colspan="100%">
                    {{ $consultas->links() }}
                    </td>
                </tr>
                @endif
            </tfoot>
        </table>
    </div>
@endif