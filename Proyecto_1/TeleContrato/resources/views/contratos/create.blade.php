@extends('layouts.base')

@section('content')
    <div class="container vh-100">
        <div class="mb-3 d-flex justify-content-center">
            <div class="form-check me-4">
                <input class="form-check-input" type="radio" name="nuevo_cliente" value="0" checked>
                <label class="form-check-label text-color-primary">Cliente Existente</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="nuevo_cliente" value="1">
                <label class="form-check-label text-color-primary">Nuevo Cliente</label>
            </div>
        </div>

        {{-- crear contrato --}}
        <form method="POST" action="{{ route('contratos.store') }}" id="form-cliente-existente" class="mb-5">
            <h2 class="text-color-primary">Crear un nuevo contrato</h2>
            @csrf
            <div class="mb-3 w-50">
                <label for="codigo_contrato" class="form-label text-color-primary">Codigo del contrato</label>
                <input id="codigo_contrato" class="form-control text-color-primary bg-input" type="number" name="codigo_contrato">
            </div>
            <div class="mb-3 w-50">
                <label for="numero_de_cliente_id" class="text-color-primary">Nombre del cliente</label>
                <select id="numero_de_cliente_id" name="numero_de_cliente_id" class="form-select text-color-primary bg-input">
                    <option hidden value="">Selecciona un cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->numero_de_cliente }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 w-50">
                <label for="numero_de_linea" class="form-label text-color-primary">Numero de linea</label>
                <input id="numero_de_linea" class="form-control text-color-primary bg-input" type="number" name="numero_de_linea">
            </div>
            <div class="mb-3 w-50">
                <label for="fecha_de_activacion" class="form-label">Fecha de activacion</label>
                <input id="fecha_de_activacion" class="form-control text-color-primary bg-input" type="date"
                    name="fecha_de_activacion">
            </div>
            <div class="mb-3 w-50">
                <label for="valor_plan" class="form-label text-color-primary">Valor plan</label>
                <input id="valor_plan" class="form-control text-color-primary bg-input" type="number" name="valor_plan">
            </div>
            <br>
            <button type="submit" class="btn button-confirm-color">Crear Contrato</button>
        </form>

        {{-- crear cliente --}}
        <form method="POST" action="{{ route('clientes.store') }}" id="form-nuevo-cliente" class="mb-5">
            <h2 class="text-color-primary">Crear un nuevo cliente</h2>
            @csrf
            <div class="mb-3 w-50">
                <label for="tipo_de_identificacion" class="text-color-primary">Tipo de identificacion</label>
                <select id="tipo_de_identificacion" name="tipo_de_identificacion" class="form-select text-color-primary bg-input">
                    <option hidden value="">Selecciona un tipo de identificación</option>
                    <option value="Cedula">Cédula</option>
                    <option value="NIT">NIT</option>
                </select>
            </div>
            <div class="mb-3 w-50">
                <label for="numero_de_cliente" class="form-label text-color-primary">Numero del cliente</label>
                <input id="numero_de_cliente" class="form-control text-color-primary bg-input" type="number" name="numero_de_cliente">
            </div>
            <div class="mb-3 w-50">
                <label for="nombre" class="form-label text-color-primary">Nombre</label>
                <input id="nombre" class="form-control text-color-primary bg-input" type="text" name="nombre">
            </div>
            <div class="mb-3 w-50">
                <label for="telefono" class="form-label text-color-primary">Telefono</label>
                <input id="telefono" class="form-control text-color-primary bg-input" type="tel" name="telefono">
            </div>
            <div class="mb-3 w-50">
                <label for="ciudad" class="form-label text-color-primary">Ciudad</label>
                <input id="ciudad" class="form-control text-color-primary bg-input" type="text" name="ciudad">
            </div>
            <div class="mb-3 w-50">
                <label for="correo" class="form-label text-color-primary">Correo</label>
                <input id="correo" class="form-control text-color-primary bg-input" type="text" name="correo">
            </div>
            <br>
            <button type="submit" class="btn button-confirm-color">Crear Contrato</button>
        </form>
    </div>
@endsection
