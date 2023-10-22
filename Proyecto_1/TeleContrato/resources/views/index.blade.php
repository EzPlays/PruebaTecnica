@extends('layouts.base')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">TeleContrato</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contratos.create') }}">Crear Contrato</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('transacciones.create') }}">Registrar Transacción</a> --}}
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('contratos.saldo') }}">Consultar Saldo</a> --}}
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection
