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

            <div class="starter-template">
                <h1>Obrigado pelo contato.</h1>
                <p class="lead">Entraremos em contato o mais breve possível!</p>
                <a href="{{ url('/') }}">Voltar</a>
            </div>

        </div>
    </body>
</html>