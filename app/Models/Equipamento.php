<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;
    protected $fillable = ['tipo_id', 'nome', 'data_aquisicao'];

    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }
}
