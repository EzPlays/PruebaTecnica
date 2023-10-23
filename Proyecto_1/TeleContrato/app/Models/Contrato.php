<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contrato extends Model
{
    public $timestamps = false;

    protected $table = 'contratos';
    protected $primaryKey = 'codigo_contrato';

    protected $fillable = ['codigo_contrato', 'numero_de_cliente_id', 'numero_de_línea', 'fecha_activacion', 'valor_plan', 'estado'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'numero_de_cliente_id', 'numero_cliente');
    }

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class, 'codigo_contrato');
    }
}
