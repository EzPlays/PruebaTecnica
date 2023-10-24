<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Transaccion;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contratos = Contrato::all();

        return view('transacciones.create', ['contratos' => $contratos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $codigoContrato = $request['codigo_contrato_id'];
            $contrato = Contrato::where('codigo_contrato', $codigoContrato)->first();

            if (!$contrato) {
                return response()->json(['error' => 'El contrato no existe']);
            }

            $valorMensual = $contrato->valor_plan;

            // Calcular la suma de los pagos realizados
            $totalPagos = Transaccion::where('codigo_contrato_id', $contrato->codigo_contrato)->sum('valor_transaccion');

            $nuevoPago = $request['valor_transaccion'];

            if (($totalPagos + $nuevoPago) > $valorMensual) {
                return response()->json(['error' => 'El nuevo pago sobrepasa el valor mensual del contrato.']);
            }

            $transaccion = new Transaccion;

            $transaccion->codigo_contrato_id = $request['codigo_contrato_id'];
            $transaccion->valor_transaccion = $request['valor_transaccion'];
            $transaccion->fecha_hora_pago = $request['fecha_hora_pago'];

            $transaccion->save();

            return response()->json(['mensaje' => 'Pago realizado']);
        } catch (\Exception $err) {
            return response()->json(['error' => 'Ocurrió un error al guardar', 'Exception' => $err]);
        }
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
