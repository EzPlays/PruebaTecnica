@extends('layouts.base')

@section('content')
    <div class="container">
        <h2>Crear un nuevo contrato</h2>
        <form method="POST" action="{{ route('contratos.store') }}">
            @csrf
            <div class="form-group">
                <label for="numero_de_cliente_id">Número de Cliente</label>
            </div>
            <button type="submit" class="btn btn-primary">Crear Contrato</button>
        </form>
    </div>
@endsection