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
        return $this->belongsToMany('App\Models\Cliente', 'cliente_item', 'item_id', 'cliente_id');
    }

    public function user()
    {
        // belongsToMany - pertence a muitos
        return $this->belongsToMany('App\Models\User', 'cliente_item', 'item_id', 'user_id');
    }
}
