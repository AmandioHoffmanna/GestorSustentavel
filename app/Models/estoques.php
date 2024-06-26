<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoques extends Model
{
    use HasFactory;

    protected $fillable = ['produto_id', 'local_id', 'quantidade'];

    public function produto()
    {
        return $this->belongsTo(produtos::class);
    }

    public function local()
    {
        return $this->belongsTo(Locais::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class);
    }
}
