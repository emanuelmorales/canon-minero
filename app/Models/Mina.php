<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mina extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'grupominero_id',
    ];

    // una mina puede pertenecer a un grupo minero
    public function grupominero()
    {
        return $this->belongsTo(GrupoMinero::class);
    }
}
