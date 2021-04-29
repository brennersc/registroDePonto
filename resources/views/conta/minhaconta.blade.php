@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">{{ __('Minha Conta') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/salvar" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $usuario->name }}" required autocomplete="name" autofocus>
                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $usuario->email }}" required autocomplete="email">
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>
                                <div class="col-md-6">
                                    <input id="cpf" type="text" data-mask="000.000.000-00"
                                        class="form-control @error('cpf') is-invalid @enderror" name="cpf"
                                        value="{{ $usuario->cpf }}" required>
                                    @if ($errors->has('cpf'))
                                        <div class="invalid-feedback">{{ $errors->first('cpf') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cargo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>
                                <div class="col-md-6">
                                    <input id="cargo" type="text" class="form-control @error('cargo') is-invalid @enderror"
                                        name="cargo" value="{{ $usuario->cargo }}" required>
                                    @if ($errors->has('cargo'))
                                        <div class="invalid-feedback">{{ $errors->first('cargo') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nascimento"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Data Nascimento') }}</label>
                                <div class="col-md-6">
                                    <input id="nascimento" type="date"
                                        class="form-control @error('nascimento') is-invalid @enderror" name="nascimento" @if (!$usuario->nascimento) value=""
                                @else
                                        value="{{ date('Y-m-d', strtotime($usuario->nascimento)) }}" @endif required>
                                    @if ($errors->has('nascimento'))
                                        <div class="invalid-feedback">{{ $errors->first('nascimento') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cep" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>
                                <div class="col-md-6">
                                    <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror"
                                        name="cep" value="{{ $usuario->cep }}" required>
                                    <div id="cep-invalid" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rua" class="col-md-4 col-form-label text-md-right">{{ __('Rua') }}</label>
                                <div class="col-md-6">
                                    <input id="rua" type="text" class="form-control @error('rua') is-invalid @enderror"
                                        name="rua" value="{{ $usuario->rua }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bairro"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Bairro') }}</label>
                                <div class="col-md-6">
                                    <input id="bairro" type="text"
                                        class="form-control @error('bairro') is-invalid @enderror" name="bairro"
                                        value="{{ $usuario->bairro }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cidade"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
                                <div class="col-md-6">
                                    <input id="cidade" type="text"
                                        class="form-control @error('cidade') is-invalid @enderror" name="cidade"
                                        value="{{ $usuario->cidade }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="estado"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                                <div class="col-md-6">
                                    <input id="estado" type="text"
                                        class="form-control @error('estado') is-invalid @enderror" name="estado"
                                        value="{{ $usuario->estado }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Salvar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer"> <a href="/home" class="btn btn-sm btn-secondary" role="button">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card border-info">
                    <div class="card-header">Altere sua senha</div>
                    <div class="card-body">
                        {{-- <form id="trocarsenha" method="POST" enctype="multipart/form-data"> --}}
                        <form id="trocarsenha" enctype="multipart/form-data">
                            <input type="hidden" id="user" value="" name="id">
                            <div class="form-group row">
                                <label for="senha" class="col-sm-4 col-form-label">Senha:</label>
                                <div class="col-sm-8">
                                    <input type="password" id="senha" name="senha" class="form-control form-control-sm"
                                        placeholder="*******">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirmasenha" class="col-sm-4 col-form-label">Confirme:</label>
                                <div class="col-sm-8">
                                    <input type="password" id="confirmasenha" name="confirmasenha"
                                        class="form-control form-control-sm" placeholder="*******">
                                </div>
                            </div>
                            <button type='submit' class="btn btn-sm btn-info float-right" role="button">
                                <ion-icon name="key-outline"></ion-icon> Trocar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Adicionando Javascript -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#trocarsenha").submit(function() {
            console.clear();
            var campo_vazio = false;
            if (($('#senha').val() == '') || ($('#confirmasenha').val() == '')) {
                $('#senha').addClass("is-invalid");
                $('#confirmasenha').addClass("is-invalid");
                return false;
                campo_vazio = true;
            }
            $.ajax({
                type: 'post',
                url: '/minhaconta/senha',
                data: {
                    _token: "{{ csrf_token() }}",
                    senha: $('#senha').val(),
                    confirmasenha: $('#confirmasenha').val(),
                },
                dataType: 'JSON',
                success: function(data) {
                    if (data.sucesso == 0) {
                        //alert('sucesso');
                        $('#senha').addClass("is-valid").val('');
                        $('#confirmasenha').addClass("is-valid").val('');
                        setTimeout(function() {
                            $('#senha').removeClass("is-valid").val('');
                            $('#confirmasenha').removeClass("is-valid").val('');
                        }, 3000);
                    }
                    if (data.sucesso == 1) {
                        //alert('igual');
                        $('#senha').addClass("is-invalid").val('');
                        $('#confirmasenha').addClass("is-invalid").val('');
                        $('#erro').show();
                        setTimeout(function() {
                            $('#senha').removeClass("is-invalid").val('');
                            $('#confirmasenha').removeClass("is-invalid").val('');
                            $('#erro').hide();
                        }, 3000);
                    }
                }
            });
            return false;
            console.clear();
        });

        setTimeout(function() {
            $('#senha').removeClass("is-invalid");
            $('#confirmasenha').removeClass("is-invalid");
        }, 3000);

    </script>
@endsection
