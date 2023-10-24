<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Transaccion;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $datosCompletos = Contrato::join('clientes', 'contratos.numero_de_cliente_id', '=', 'clientes.numero_de_cliente')
            ->join('transacciones', 'contratos.codigo_contrato', '=', 'transacciones.codigo_contrato_id')
            ->select('clientes.*', 'contratos.*', 'transacciones.*')
            ->get();

        return view('index', ['informes' => $datosCompletos]);
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
        try {
            $clientes = new Contrato;

            $clientes->codigo_contrato = $request['codigo_contrato'];
            $clientes->numero_de_cliente_id = $request['numero_de_cliente_id'];
            $clientes->numero_de_línea = $request['numero_de_linea'];
            $clientes->fecha_activacion = $request['fecha_de_activacion'];
            $clientes->valor_plan = $request['valor_plan'];

            $clientes->save();

            return response()->json(['mensaje' => 'Contrato guardado']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrió un error al guardar', 'Exception' => $e]);
        }
    }

    public function saldo()
    {

        $contratos = Contrato::all();

        $saldoInfo = [];

        foreach ($contratos as $contrato) {
            $transaccion = Transaccion::where('codigo_contrato_id', $contrato->codigo_contrato)
                ->orderBy('fecha_hora_pago')
                ->first();

            $totalPagos = Transaccion::where('codigo_contrato_id', $contrato->codigo_contrato)->sum('valor_transaccion');
            $saldoPendiente = $contrato->valor_plan - $totalPagos;

            $saldoInfo[$contrato->codigo_contrato] = [
                'saldo_pendiente' => $saldoPendiente,
                'ultima_transaccion' => $transaccion,
            ];
        }

        return view('contratos.saldo', ['saldoInfo' => $saldoInfo]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
