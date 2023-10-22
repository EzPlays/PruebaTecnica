@extends('layouts.base')

@section('content')
    <div class="container">
        <h2>Registrar una nueva transacción</h2>
        <form method="POST" action="{{ route('transacciones.store') }}">
            @csrf
            <div class="form-group">
                <label for="codigo_contrato_id">Código del Contrato</label>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Transacción</button>
        </form>
    </div>
@endsection