<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'documento',
        'uf',
        'municipio',
        'cep',
        'rua',
        'complemento',
    ];

    public function items()
    {
        // hasMany - tem muitos
        return $this->hasMany('App\Models\Item');
    }
}
