<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{

    use HasFactory;

    protected $fillable = [
        'fecha',
        'expte',
        'localidad_id',
        'mina_id',
        'mineral_id',
        'propietario_id',
        'estado_exp_id',
        'categoria',
        'pertenencia',
        'superficie',
        'anioPago',
        'monto',
        'detalle',
        'archivo_adjunto',
    ];

    //############ MUY IMPORTANTE AGREGAR ESTE CÓDIGO, SINO NO FUNCIONA ############
    public function Localidad()
    {
        return $this->belongsTo(Localidad::class);
    }
    public function Mina()
    {
        return $this->belongsTo(Mina::class);
    }
    public function Mineral()
    {
        return $this->belongsTo(Mineral::class);
    }
    public function Propietario()
    {
        return $this->belongsTo(Propietario::class);
    }
    public function EstadoExp()
    {
        return $this->belongsTo(EstadoExp::class);
    }
}
