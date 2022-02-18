<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente_Item extends Model
{
    use HasFactory;

    protected $table = 'cliente_item';

    protected $fillable = [
        'user_id',
        'cliente_id',
        'item_id',
    ];
}
