<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $fillable = ['titulo', 'observacao', 'cliente_id', 'pedido_id'];

    public static $rules = [
        'titulo' => 'required|min:5',
        'observacao' => 'required|min:10',
        'clinete_id' => 'required|numeric',
        'pedido_id' => 'required|numeric'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function pedido()
    {
        return $this->belongsTo('App\Models\Pedido');
    }
}
