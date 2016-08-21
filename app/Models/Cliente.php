<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome', 'email', 'telefone'];

    public static $rules = [
        'nome' => 'required|min:5',
        'email' => 'required|email|unique:clientes,email,#id',
        'telefone' => 'required|min:14|max:15'
    ];

    public function chamados()
    {
        return $this->hasMany('App\Models\Chamados');
    }
}
