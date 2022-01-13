<?php

namespace App\Models\Seccion_clientes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    /**
     * Get all of the direccions for the Cliente
     */
    public function direcciones()
    {
        return $this->hasMany(Direccion::class); 
    }
}
