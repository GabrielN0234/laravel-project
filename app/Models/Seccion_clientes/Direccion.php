<?php

namespace App\Models\Seccion_clientes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    /**
     * Get the Ciente that owns the Direccion.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
