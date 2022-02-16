<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco',
        'codigo',
    ];
    
    public function cliente()
    {
        // belongsTo - pertence a
        return $this->belongsTo('App\Models\Cliente');
    }
}
