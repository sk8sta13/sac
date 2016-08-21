<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="SAC - Serviço de Atendimento ao Cliente.">
        <meta name="author" content="Marcelo Soto Campos <sk8sta13@gmail.om>">
        <link rel="icon" href="{{ asset('/favicon.ico') }}">

        <title>SAC - Serviço de Atendimento ao Cliente</title>

        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/sac.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="row marketing">
                <div class="col-lg-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nº Pedido</td>
                                <th>E-mail</th>
                                <th>Criado em</th>
                                <th>Ultima interação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($chamados))
                                @foreach ($chamados as $chamado)
                                    <tr>
                                        <td class="text-right">{{ $chamado->pedido_id }}</td>
                                        <td>{{ $chamado->cliente->email }}</td>
                                        <td>{{ $chamado->created_at->format('d/m/Y à\s H:i') }}</td>
                                        <td>{{ $chamado->updated_at->format('d/m/Y à\s H:i') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td class="text-center">Nenhum chamado encontrado...</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>