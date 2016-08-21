<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function show(Request $request)
    {
        if ($request->ajax()) {
            $cliente = Cliente::where('email', $request->get('email'))
                ->get();
            if ($cliente->count()) {
                return $cliente->first()->toJson();
            } else {
                return response()->json(['id' => '', 'nome' => '', 'email' => '', 'telefone' => '']);
            }
        } else {
            return view('errors.404');
        }
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {
            return view('clientes.create')
                ->with(['nome' => $request->get('nome'), 'email' => $request->get('email')]);
        } else {
            return view('errors.404');
        }
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = \Validator::make($request->all(), Cliente::$rules);
            if ($validator->fails()) {
                return response()->json([
                    'status'	=> 0,
                    'message'	=> 'Corrija os seguintes erros de validação no fromulário',
                    'erros'		=> $validator->errors()->all()
                ]);
            } else {
                $cliente = Cliente::create([
                    'nome'      => $request->get('nome'),
                    'email'     => $request->get('email'),
                    'telefone'  => $request->get('telefone')
                ]);
                return response()->json([
                    'status'	=> 1,
                    'message'	=> 'Seus dados forão salvos con sucesso.',
                    'id'        => $cliente->id
                ]);
            }
        } else {
            return view('errors.404');
        }
    }
}
