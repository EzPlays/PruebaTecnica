<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>TeleContrato</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('inicio') }}">TeleContrato</a>
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
                        <a class="nav-link" href="{{ route('transacciones.create') }}">Crear Transaccion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contratos.saldo') }}">Consultar Saldo</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
<script>
$(document).ready(function() {
    // Oculta el formulario de Nuevo Cliente inicialmente
    $('#form-nuevo-cliente').hide();

    // Maneja el cambio en el campo de selección (Cliente Existente o Nuevo Cliente)
    $('input[name="nuevo_cliente"]').on('change', function() {
        if ($(this).val() == '0') {
            $('#form-cliente-existente').show();
            $('#form-nuevo-cliente').hide();
        } else {
            $('#form-cliente-existente').hide();
            $('#form-nuevo-cliente').show();
        }
    });
});
</script>

</html>
