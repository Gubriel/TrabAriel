<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = ['equipamento_id', 'local_id', 'cliente_id', 'data', 'horario', 'devolucao'];

    public function equipamento(){
        return $this->belongsTo(Equipamento::class);
    }

    public function local(){
        return $this->belongsTo(Local::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
