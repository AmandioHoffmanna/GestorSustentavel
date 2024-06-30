<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locais extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'endereco', 'horario_funcionamento'];

    public function estoques()
    {
        return $this->hasMany(Estoques::class);
    }
}
