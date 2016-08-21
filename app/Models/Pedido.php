<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['qtd_itens', 'preco_total', 'observacao'];

    public static $rules = [
        'qtd_itens' => 'required|numeric',
        'preco_total' => 'required'
    ];

    public function chamados()
    {
        return $this->belongsToMany('App\Models\Chamados');
    }
}
