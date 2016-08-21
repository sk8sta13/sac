<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="SAC - Serviço de Atendimento ao Cliente.">
        <meta name="author" content="Marcelo Soto Campos <sk8sta13@gmail.om>">
        <link rel="icon" href="{{ asset('/favicon.ico') }}">

        <title>SAC - Serviço de Atendimento ao Cliente</title>

        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/jquery-confirm.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/sac.css') }}" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="{{ asset('/js/ie8-responsive-file-warning.js') }}"></script><![endif]-->
        <script src="{{ asset('/js/ie-emulation-modes-warning.js') }}"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            <div class="row marketing">
                <div class="col-lg-12">
                    <form method="get" action="/report">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Email" />
                                    <input type="hidden" name="_cliente" id="_cliente" value="">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="pedido">Nº Pedido</label>
                                    <input type="text" class="form-control" name="pedido" id="pedido" placeholder="Nº Pedido" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="nome">&nbsp;</label>
                                    <button type="submit" class="form-control btn btn-success pull-right">
                                        <span class="glyphicon glyphicon-search"></span>
                                        Buscar
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="nome">&nbsp;</label>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Exportar <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="/exportar?tipo=html" class="exportar" target="_blank">HTML</a></li>
                                            <li><a href="/exportar?tipo=csv" class="exportar" target="_blank">CSV</a></li>
                                            <li><a href="/exportar?tipo=pdf" class="exportar" target="_blank">PDF</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row marketing">
                <div class="col-lg-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Nº Pedido</td>
                                <td>E-mail</td>
                                <td>Criado em</td>
                                <td>Ultima interação</td>
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
                                <tr><td class="text-center" colspan="4">Nenhum Chamado...</td></tr>
                            @endif
                        </tbody>
                        <tfoot>
                            @if (count($chamados))
                                <tr><td class="text-center" colspan="4">{!! $chamados->appends($request)->render() !!}</td></tr>
                            @endif
                        </tfoot>
                    </table>
                </div>
            </div>

            <footer class="footer">
                <p>&copy; 2016 Marcelo Soto Campos.</p>
            </footer>
        </div>
        <script src="{{ asset('/js/ie10-viewport-bug-workaround.js') }}"></script>
        <script src="{{ asset('/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('.exportar').click(function(e) {
                    //e.preventDefault()
                    var href = $(this).attr('href');
                    href += '&email=' + $('#email').val();
                    href += '&pedido=' + $('#pedido').val();
                    window.open(href, '_blank');
                });
            });
        </script>
    </body>
</html>
