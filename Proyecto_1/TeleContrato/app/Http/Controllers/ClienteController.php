<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function create()
    {
        return view('contratos.create');
    }

    public function store(Request $request)
    {
        $clientes = new Cliente;

        $clientes->tipo_de_identificacion = $request['tipo_identificacion'];
        $clientes->numero_de_cliente = $request['numero_de_cliente'];
        $clientes->nombre = $request['nombre'];
        $clientes->telefono = $request['telefono'];
        $clientes->ciudad = $request['ciudad'];
        $clientes->correo = $request['correo'];

        $clientes->save();

        return redirect('/');
    }
}
