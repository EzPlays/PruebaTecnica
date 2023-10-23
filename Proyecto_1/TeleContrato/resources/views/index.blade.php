@extends('layouts.base')

@section('content')
<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Código de Contrato</th>
                    <th>Nombre del Cliente</th>
                    <th>Número de Cliente</th>
                    <th>Número de Línea</th>
                    <th>Fecha de Activación</th>
                    <th>Valor del Plan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contratos as $contrato)
                    <tr>
                        <td>{{ $contrato->codigo_contrato }}</td>
                        <td>{{ $contrato->nombre_cliente }}</td>
                        <td>{{ $contrato->numero_de_cliente_id }}</td>
                        <td>{{ $contrato->numero_de_línea }}</td>
                        <td>{{ $contrato->fecha_activacion }}</td>
                        <td>{{ $contrato->valor_plan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
