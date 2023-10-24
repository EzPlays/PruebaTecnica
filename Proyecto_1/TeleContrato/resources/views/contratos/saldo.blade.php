@extends('layouts.base')

@section('content')
    <div class="container vh-100">
        <h2 class="text-color-primary">Consulta de Saldo</h2>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-color-primary">Código del Contrato</th>
                    <th class="text-color-primary">Saldo Pendiente</th>
                    <th class="text-color-primary">Última Transacción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($saldoInfo as $codigoContrato => $info)
                    <tr>
                        <td class="text-color-primary">{{ $codigoContrato }}</td>
                        <td class="text-color-primary">{{ $info['saldo_pendiente'] }}</td>
                        <td class="text-color-primary">
                            @if ($info['ultima_transaccion'])
                                {{ $info['ultima_transaccion']->valor_transaccion }}
                            @else
                                No hay transacciones
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection