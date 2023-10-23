<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps = false;

    protected $table = 'clientes';
    protected $primaryKey = 'numero_de_cliente';

    protected $fillable = ['tipo_de_identificacion', 'numero_de_cliente', 'nombre', 'telefono', 'ciudad', 'correo'];

    public function contratos()
    {
        return $this->hasMany(Contrato::class, 'numero_de_cliente');
    }
}
