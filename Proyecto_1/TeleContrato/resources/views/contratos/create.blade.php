@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="mb-3 d-flex">
            <div class="form-check me-4">
                <input class="form-check-input" type="radio" name="nuevo_cliente" value="0" checked>
                <label class="form-check-label">Cliente Existente</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="nuevo_cliente" value="1">
                <label class="form-check-label">Nuevo Cliente</label>
            </div>
        </div>
        <form method="POST" action="{{ route('contratos.store') }}" id="form-cliente-existente">
            <h2>Crear un nuevo contrato</h2>
            @csrf
            <div class="mb-3">
                <label for="codigo_contrato" class="form-label">Codigo del contrato</label>
                <input required id="codigo_contrato" class="form-control w-50" type="number" name="codigo_contrato">
            </div>
            <div class="mb-3">
                <label for="numero_de_cliente_id">Nombre del cliente</label>
                <select required id="numero_de_cliente_id" name="numero_de_cliente_id" class="form-select w-50">
                    <option hidden value="" >Selecciona un cliente</option>
                    @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->numero_de_cliente }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="numero_de_linea" class="form-label">Numero de linea</label>
                <input required id="numero_de_linea" class="form-control w-50" type="number" name="numero_de_linea">
            </div>
            <div class="mb-3">
                <label for="fecha_de_activacion" class="form-label">Fecha de activacion</label>
                <input required id="fecha_de_activacion" class="form-control w-50" type="date" name="fecha_de_activacion">
            </div>
            <div class="mb-3">
                <label for="valor_plan" class="form-label">Valor plan</label>
                <input required id="valor_plan" class="form-control w-50" type="number" name="valor_plan">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Crear Contrato</button>
        </form>
        <form method="POST" action="{{ route('clientes.store') }}" id="form-nuevo-cliente">
            <h2>Crear un nuevo cliente</h2>
            @csrf
            <div class="mb-3">
                <label for="tipo_identificacion">Tipo de identificacion</label>
                <select required id="tipo_identificacion" name="tipo_identificacion" class="form-select w-50">
                    <option hidden value="">Selecciona un tipo de identificacion</option>
                        <option value="Cedula">Cédula</option>
                        <option value="NIT">NIT</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="numero_de_cliente" class="form-label">Numero de cliente</label>
                <input required id="numero_de_cliente" class="form-control w-50" type="number" name="numero_de_cliente">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input required id="nombre" class="form-control w-50" type="text"
                    name="nombre">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input required id="telefono" class="form-control w-50" type="tel" name="telefono">
            </div>
            <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input required id="ciudad" class="form-control w-50" type="text" name="ciudad">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input required id="correo" class="form-control w-50" type="text" name="correo">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Crear Contrato</button>
        </form>
    </div>
@endsection
