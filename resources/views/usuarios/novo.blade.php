@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4>Novo Usuário</h4>
                </div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form action="/usuarios" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>
                            <div class="col-md-6">
                                <input id="cpf" type="text" data-mask="000.000.000-00"
                                    class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required>
                                @if ($errors->has('cpf'))
                                    <div class="invalid-feedback">{{ $errors->first('cpf') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cargo" class="col-md-4 col-form-label text-md-right">{{ __('Cargo') }}</label>
                            <div class="col-md-6">
                                <input id="cargo" type="text" class="form-control @error('cargo') is-invalid @enderror"
                                    name="cargo" value="{{ old('cargo') }}" required>
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
                                    class="form-control @error('nascimento') is-invalid @enderror" name="nascimento"
                                    value="{{ old('nascimento') }}" required>
                                @if ($errors->has('nascimento'))
                                    <div class="invalid-feedback">{{ $errors->first('nascimento') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cep" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>
                            <div class="col-md-6">
                                <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror"
                                    name="cep" value="{{ old('cep') }}" required>
                                <div id="cep-invalid" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rua" class="col-md-4 col-form-label text-md-right">{{ __('Rua') }}</label>
                            <div class="col-md-6">
                                <input id="rua" type="text" class="form-control @error('rua') is-invalid @enderror"
                                    name="rua" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bairro" class="col-md-4 col-form-label text-md-right">{{ __('Bairro') }}</label>
                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror"
                                    name="bairro" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cidade" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
                            <div class="col-md-6">
                                <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror"
                                    name="cidade" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                            <div class="col-md-6">
                                <input id="estado" type="text" class="form-control @error('estado') is-invalid @enderror"
                                    name="estado" value="" readonly>
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
                <div class="card-footer">
                    <a type="button" href="/usuarios" class="btn btn-secondary btn-sm">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
