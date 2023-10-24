import './bootstrap';
import Swal from 'sweetalert2'

// validacion de formularios
document.addEventListener("DOMContentLoaded", function () {

    // validacion de datos form crear contrato
    const form_cliente_existente = document.getElementById('form-cliente-existente');
    if (form_cliente_existente) {
        form_cliente_existente.addEventListener('submit', function (event) {
            event.preventDefault(); // Evitar que el formulario se envíe automáticamente

            let codigo_contrato = document.getElementById('codigo_contrato').value;
            let numero_de_cliente_id = document.getElementById('numero_de_cliente_id').value;
            let numero_de_linea = document.getElementById('numero_de_linea').value;
            let fecha_de_activacion = document.getElementById('fecha_de_activacion').value;
            let valor_plan = document.getElementById('valor_plan').value;

            if (codigo_contrato === '' || isNaN(parseInt(codigo_contrato))) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa un codigo de contrato',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            if (numero_de_cliente_id === '' || isNaN(parseInt(numero_de_cliente_id))) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa un cliente',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            if (numero_de_linea === '' || isNaN(parseInt(numero_de_linea))) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa el numero de linea',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            const regexFecha = /^\d{4}-\d{2}-\d{2}$/; // exprecion regular para validad el formato YYYY-MM-DD de la fecha

            if (fecha_de_activacion === '' || !regexFecha.test(fecha_de_activacion)) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa la fecha de activacion',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            if (valor_plan === '' || isNaN(parseInt(valor_plan))) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa el valor del plan',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            fetch('/contratos', {
                method: 'POST',
                body: new FormData(form_cliente_existente),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        Swal.fire({
                            title: 'Error!',
                            text: data.error,
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                        console.error(data.Exception);
                    } else if (data.mensaje) {
                        Swal.fire({
                            title: 'Exito!',
                            text: data.mensaje,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })

                        document.getElementById('codigo_contrato').value = ''
                        document.getElementById('numero_de_cliente_id').value = ''
                        document.getElementById('numero_de_linea').value = ''
                        document.getElementById('fecha_de_activacion').value = ''
                        document.getElementById('valor_plan').value = ''

                    }
                });

        });
    }

    // validaciones formulario de crear cliente
    const form_nuevo_cliente = document.getElementById('form-nuevo-cliente');
    if (form_nuevo_cliente) {
        form_nuevo_cliente.addEventListener('submit', function (event) {
            event.preventDefault();

            let tipo_de_identificacion = document.getElementById('tipo_de_identificacion').value;
            let numero_de_cliente = document.getElementById('numero_de_cliente').value;
            let nombre = document.getElementById('nombre').value;
            let telefono = document.getElementById('telefono').value;
            let ciudad = document.getElementById('ciudad').value;
            let correo = document.getElementById('correo').value;

            if (tipo_de_identificacion === '' || (tipo_de_identificacion !== 'Cedula' && tipo_de_identificacion !== 'NIT')) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa un tipo de identificación',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            if (numero_de_cliente === '' || isNaN(parseInt(numero_de_cliente))) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa un numero de cliente',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            if (nombre === '') {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa un nombre',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            if (telefono === '' || isNaN(parseInt(telefono))) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa un numero de telefono',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            if (ciudad === '') {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa una ciudad',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            if (ciudad === '') {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa una ciudad',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            var regexCorreo = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (correo === '' || !regexCorreo.test(correo)) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa un correo valido',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            fetch('/clientes', {
                method: 'POST',
                body: new FormData(form_nuevo_cliente),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        Swal.fire({
                            title: 'Error!',
                            text: data.error,
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                        console.error(data.Exception);
                    } else if (data.mensaje) {
                        Swal.fire({
                            title: 'Exito!',
                            text: data.mensaje,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })

                        document.getElementById('tipo_de_identificacion').value = ''
                        document.getElementById('numero_de_cliente').value = ''
                        document.getElementById('nombre').value = ''
                        document.getElementById('telefono').value = ''
                        document.getElementById('ciudad').value = ''
                        document.getElementById('correo').value = ''

                    }
                });

        });
    }

    // validaciones registrar pago
    const registrar_pago = document.getElementById('registrar_pago');
    if (registrar_pago) {
        registrar_pago.addEventListener('submit', function (event) {
            event.preventDefault();

            let codigo_contrato_id = document.getElementById('codigo_contrato_id').value;
            let valor_transaccion = document.getElementById('valor_transaccion').value;
            let fecha_hora_pago = document.getElementById('fecha_hora_pago').value;

            console.log(fecha_hora_pago);
            if (codigo_contrato_id === '' || isNaN(parseInt(codigo_contrato_id))) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa un codigo de contrato',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            if (valor_transaccion === '' || isNaN(parseInt(valor_transaccion))) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa el valor a pagar',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            var regexFechaHora = /^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/;

            if (fecha_hora_pago === '' || !regexFechaHora.test(fecha_hora_pago)) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Ingresa una fecha y hora',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
                return;
            }

            fetch('/transacciones', {
                method: 'POST',
                body: new FormData(registrar_pago),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        Swal.fire({
                            title: 'Error!',
                            text: data.error,
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                        console.error(data.Exception);
                    } else if (data.mensaje) {
                        Swal.fire({
                            title: 'Exito!',
                            text: data.mensaje,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })

                        document.getElementById('codigo_contrato_id').value = ''
                        document.getElementById('valor_transaccion').value = ''
                        document.getElementById('fecha_hora_pago').value = ''

                    }
                });

        });
    }

    // alternar formulario de creacion de contrato y cliente
    var formClienteExistente = document.getElementById("form-cliente-existente");
    var formNuevoCliente = document.getElementById("form-nuevo-cliente");
    var nuevoClienteInputs = document.querySelectorAll('input[name="nuevo_cliente"]');

    if (formNuevoCliente) {
        formNuevoCliente.style.display = "none";
        nuevoClienteInputs.forEach(function (input) {
            input.addEventListener("change", function () {
                if (input.value === "0") {
                    formClienteExistente.style.display = "block";
                    formNuevoCliente.style.display = "none";
                } else {
                    formClienteExistente.style.display = "none";
                    formNuevoCliente.style.display = "block";
                }
            });
        });
    }

    // generar pdf
    document.getElementById('printButton').addEventListener('click', function () {
        var contentToPrint = document.getElementById('contentToPrint');

        var popupWin = window.open('', '_blank', 'width=800,height=800');
        popupWin.document.open();

        // Agregar estilos de Bootstrap al contenido impreso
        popupWin.document.write('<html><head><title>Impresión</title>');
        popupWin.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">');
        popupWin.document.write('<link rel="stylesheet" href="css/app.css">');
        popupWin.document.write('</head><body>');

        popupWin.document.write(contentToPrint.innerHTML);

        popupWin.document.write('</body></html>');
        popupWin.document.close();

        popupWin.onload = function () {
            popupWin.print();
            popupWin.close();
        };
    });

});
