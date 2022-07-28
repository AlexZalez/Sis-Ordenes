<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;

class Equipo extends Model
{
    protected $table = 'equipos';

    protected $attributes = [
        'fecha_f' => 'null',
        'fecha_p' => 'null',
        'diagnostico_f' => 'null',
        'diagnostico_p' => 'null',
        
    ];

    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'clientes_id');
    }

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

}
