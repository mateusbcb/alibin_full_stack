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
        return $this->belongsToMany('App\Models\Item', 'cliente_item', 'cliente_id', 'item_id');
    }

    public function user()
    {
        // belongsToMany - pertence a muitos
        return $this->belongsToMany('App\Models\User', 'cliente_item', 'cliente_id', 'user_id');
    }
}
