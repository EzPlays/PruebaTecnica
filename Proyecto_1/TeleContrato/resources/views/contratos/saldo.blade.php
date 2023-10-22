@extends('layouts.base')

@section('content')
    <div class="container">
        <h2>Consulta de Saldo</h2>
        <p>Contrato: {{ $contrato->codigo_contrato }}</p>
        <p>Saldo por pagar: ${{ $saldo }}</p>
        @if($ultimaTransaccion)
            <p>Última transacción: {{ $ultimaTransaccion->fecha_hora_pago }}</p>
        @endif
    </div>
@endsection