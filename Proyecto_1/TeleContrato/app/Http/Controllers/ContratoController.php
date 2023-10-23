<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Contrato;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contrato::join('clientes', 'contratos.numero_de_cliente_id', '=', 'clientes.numero_de_cliente')
            ->select('contratos.*', 'clientes.nombre as nombre_cliente')
            ->get();
        return view('index', ['contratos' => $contratos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('contratos.create', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $clientes = new Contrato;

        $clientes->codigo_contrato = $request['codigo_contrato'];
        $clientes->numero_de_cliente_id = $request['numero_de_cliente_id'];
        $clientes->numero_de_línea = $request['numero_de_linea'];
        $clientes->fecha_activacion = $request['fecha_de_activacion'];
        $clientes->valor_plan = $request['valor_plan'];

        $clientes->save();

        return redirect('/');
    }

    public function saldo()
    {
        // $contratos = Contrato::join('clientes', 'contratos.numero_de_cliente_id', '=', 'clientes.numero_de_cliente')
        //     ->select('contratos.*', 'clientes.nombre as nombre_cliente')
        //     ->get();
        return view('contratos.saldo');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('contratos.saldo');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
