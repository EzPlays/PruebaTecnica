<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    public $timestamps = false;

    protected $table = 'transacciones';

    protected $fillable = ['codigo_contrato_id', 'valor_transaccion', 'fecha_hora_pago'];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'codigo_contrato_id');
    }
}
