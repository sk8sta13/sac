<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function exists(Request $request)
    {
        if ($request->ajax()) {
            $pedido = Pedido::where('id', $request->get('id'))->get();
            return response()->json(['exists' => $pedido->count()]);
        } else {
            return view('404');
        }
    }
}
