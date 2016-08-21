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
            <div class="jumbotron">
                <h1>Fale Conosco.</h1>
                <p class="lead">Será um prazer esclarecer todas as suas dúvidas sobre os nossos produtos e serviços, saber suas sugestões, críticas e elogios.</p>
            </div>

            <div class="row marketing">
                <div class="col-lg-12">
                    <form method="post" action="/enviar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if($errors->any())
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>Corrijá os seguintes erros de validação no formulário.</strong>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" />
                                    <input type="hidden" name="_cliente" id="_cliente" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="pedido">Número do pedido</label>
                                    <input type="text" class="form-control" name="pedido" id="pedido" placeholder="Pedido" />
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="titulo">Titulo</label>
                                    <input type="text" class="form-control" name="titulo" placeholder="Titulo" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="obs">Observação</label>
                                    <textarea name="obs" rows="5" class="form-control" placeholder="Observação"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success pull-right">
                                        <span class="glyphicon glyphicon-send"></span>
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <footer class="footer">
                <p>&copy; 2016 Marcelo Soto Campos.</p>
            </footer>
        </div>
        <script src="{{ asset('/js/ie10-viewport-bug-workaround.js') }}"></script>
        <script src="{{ asset('/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/jquery-confirm.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#email').blur(function(e) {
                    if ($(this).val() != '') {
                        $.getJSON('/getCliente?email=' + $(this).val(), function (data) {
                            if (data.nome == '') {
                                var url = '{{ url('/cliente/create') }}?nome=' + $('#nome').val() + '&email=' + $('#email').val();
                                $.dialog({
                                    title: 'Cadastre-se!',
                                    content: 'url:' + url,
                                    columnClass: 'col-md-6 col-md-offset-3'
                                });
                            } else {
                                $('#nome').val(data.nome);
                                $('#_cliente').val(data.id)
                            }
                        });
                    }
                });

                $('#pedido').blur(function(e) {
                    if ($(this).val() != '') {
                        $.getJSON('/getPedido?id=' + $(this).val(), function (data) {
                            if (data.exists == 0) {
                                $.alert({
                                    title: 'Informação!',
                                    confirmButton: 'Ok',
                                    content: 'Pedido não encontrado.',
                                    confirm: function () {
                                        $('#pedido').val('');
                                        $('#pedido').focus();
                                    }
                                });
                            }
                        });
                    }
                });
            });
        </script>
    </body>
</html>
