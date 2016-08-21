<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Chamado;

class SacController extends Controller
{
    public function index()
    {
        return view('sac');
    }

    public function send(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nome'      => 'required|min:5',
            'email'     => 'required|email',
            'pedido'    => 'required|numeric',
            'titulo'    => 'required|min:5',
            'obs'       => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return \Redirect::to('/')
                ->withErrors($validator)
                ->withInput();
        } else {
            Chamado::create([
                'titulo'        => $request->get('titulo'),
                'observacao'    => $request->get('obs'),
                'cliente_id'    => $request->get('_cliente'),
                'pedido_id'     => $request->get('pedido')
            ]);
            return view('success');
        }
    }

    public function report(Request $request)
    {
        $chamados = Chamado::orderBy('updated_at', 'desc');

        $data['request'] = $request->all();
        unset($data['request']['page']);

        if ($request->get('email')) {
            $chamados->whereHas('Cliente', function($query) use($request) {
                $query->where('email', 'like', $request->get('email'));
            });
        }

        if ($request->get('pedido')) {
            $chamados->where('pedido_id', $request->get('pedido'));
        }

        $data['chamados'] = $chamados->paginate(5);

        return view('chamados.index')
            ->with($data);
    }

    public function export(Request $request)
    {
        $chamados = Chamado::orderBy('updated_at', 'desc');

        if ($request->get('email')) {
            $chamados->whereHas('Cliente', function($query) use($request) {
                $query->where('email', 'like', $request->get('email'));
            });
        }

        if ($request->get('pedido')) {
            $chamados->where('pedido_id', $request->get('pedido'));
        }

        switch ($request->get('tipo')) {
            case 'html':
                return view('chamados.html')
                    ->with('chamados', $chamados->get());
            break;
            case 'csv':
                $chamados = $chamados->get();
                $csv = fopen('tmp/chamados.csv', 'w+');
                fwrite($csv, utf8_decode("Nº Pedido;E-mail;Criado em;Ultima interação\n"));
                foreach ($chamados as $chamado) {
                    $line = $chamado->pedido_id;
                    $line .= ';' . $chamado->cliente->email;
                    $line .= ';' . utf8_decode($chamado->created_at->format('d/m/Y à\s H:i'));
                    $line .= ';' . utf8_decode($chamado->updated_at->format('d/m/Y à\s H:i'));
                    $line .= "\n";
                    fwrite($csv, $line);
                }
                fclose($csv);

                return \Response::download('tmp/chamados.csv', 'chamados.csv', ['content-type' => 'text/cvs']);
            break;
            case 'pdf':
                \PDF::loadView('chamados.html', ['chamados' => $chamados->get()])
                    ->stream('chamados.pdf');
            break;
        }
    }
}
