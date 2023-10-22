<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = ['tipo_identificacion', 'numero_de_cliente', 'nombre', 'telefono', 'ciudad', 'correo'];

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'numero_de_cliente');
    }
}
