@extends('layouts.base')

@section('content')
    <div class="container vh-100">
        <button class="btn button-confirm-color" id="printButton">Generar PDF</button>
        <div id="contentToPrint">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('images/logo.png') }}" alt="logo empresa" width="200">
            </div>
            @foreach ($informes as $informe)
                <fieldset class="border-color rounded-3 p-3">
                    <legend class="float-none w-auto px-3 text-color-primary">Informe</legend>
                    <h2 class="text-color-primary">Información del cliente</h2>
                    <li><strong>Tipo de identificacíon:</strong> {{ $informe->tipo_de_identificacion }}</li>
                    <li><strong>Numero del informe:</strong> {{ $informe->numero_de_informe }}</li>
                    <li><strong>Nombre:</strong> {{ $informe->nombre }}</li>
                    <li><strong>Telefono:</strong> {{ $informe->telefono }}</li>
                    <li><strong>Ciudad:</strong> {{ $informe->ciudad }}</li>
                    <li><strong>Correo:</strong> {{ $informe->correo }}</li>
                    <br>

                    <h2 class="text-color-primary">Información del contrato</h2>
                    <li><strong>Codigo del contrato:</strong> {{ $informe->codigo_contrato }}</li>
                    <li><strong>Numero del cliente:</strong> {{ $informe->numero_de_cliente_id }}</li>
                    <li><strong>Numero de la linea:</strong> {{ $informe->numero_de_línea }}</li>
                    <li><strong>Fecha de activacion:</strong> {{ $informe->fecha_activacion }}</li>
                    <li><strong>Valor del plan:</strong> {{ $informe->valor_plan }}</li>
                    <br>

                    <h2 class="text-color-primary">Informacion del pago</h2>
                    <li><strong>Valor del pago:</strong> {{ $informe->valor_transaccion }}</li>
                    <li><strong>Fecha y hora del pago:</strong> {{ $informe->fecha_hora_pago }}</li>
                    <br>
                </fieldset>
                <br>
            @endforeach
            <!-- Pie de página -->
            <footer>
                <p><strong class="text-color-primary">Dirección de la empresa: Calle 2ª # 45-99</strong></p>
                <p><strong class="text-color-primary">URL: <a href="https://www.empresa.com">https://www.empresa.com</a></strong></p>
            </footer>
        </div>
    </div>
@endsection
