<form method="post" action="{{ url('/cliente') }}" id="frmCliente">
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

    <div class="alert alert-danger" role="alert" style="display: none;">
        <strong></strong>
        <ul></ul>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{ $nome }}" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $email }}" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <button type="submit" class="btn btn-success pull-right" id="btnSalvar">
                    <span class="glyphicon glyphicon-floppy-disk"></span>
                    Salvar
                </button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('#btnSalvar').click(function(e) {
            e.preventDefault();
            var route = $('#frmCliente').attr('action');
            var data = new FormData();
            data.append('_token', $('#_token').val());
            data.append('nome', $('#nome').val());
            data.append('email', $('#email').val());
            data.append('telefone', $('#telefone').val());
            $.ajax({
                url: route,
                type: "POST",
                data: data,
                processData: false,
                contentType: false
            }).done(function(result) {
                if (result.status){
                    $('#_cliente').val(result.id)
                    $.alert({
                        title: 'Informação!',
                        confirmButton: 'Ok',
                        content: result.message,
                        confirm: function () {
                            $('.closeIcon').trigger('click');
                        }
                    });
                } else {
                    $('#frmCliente .alert strong').html('')
                    $('#frmCliente .alert ul').html('');

                    $('#frmCliente .alert strong').html(result.message);
                    $('#frmCliente .alert').show();
                    result.erros.forEach(function(element, index, array) {
                        $('#frmCliente .alert ul').append('<li>' + element + '</li>');
                    });
                }
            });
        });
    });
</script>