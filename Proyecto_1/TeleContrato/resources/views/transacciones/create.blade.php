@extends('layouts.base')

@section('content')
    <div class="container vh-100">
        <h2 class="text-color-primary">Registrar un pago</h2>
        <form method="POST" action="{{ route('transacciones.store') }}" id="registrar_pago">
            @csrf
            <div class="mb-3 w-50">
                <label for="codigo_contrato_id" class="text-color-primary">Codigo del contrato</label>
                <select id="codigo_contrato_id" name="codigo_contrato_id" class="form-select text-color-primary bg-input">
                    <option hidden value="">Selecciona un codigo del contrato</option>
                    @foreach ($contratos as $contrato)
                        <option value="{{ $contrato->codigo_contrato }}">{{ $contrato->codigo_contrato }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 w-50">
                <label for="valor_transaccion" class="form-label text-color-primary">Valor a pagar</label>
                <input id="valor_transaccion" class="form-control text-color-primary bg-input" type="number" name="valor_transaccion">
            </div>
            <div class="mb-3 w-50">
                <label for="fecha_hora_pago" class="form-label text-color-primary">Fecha y hora</label>
                <input id="fecha_hora_pago" class="form-control text-color-primary bg-input" type="datetime-local" name="fecha_hora_pago">
            </div>
            <button type="submit" class="btn button-confirm-color">Crear Transaccion</button>
        </form>
    </div>
@endsection
