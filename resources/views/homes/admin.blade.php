@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="alert alert-success" role="alert" style="display: none">
                    Ponto registrado com Sucesso <span class="data"></span> - <span class="hora"></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Usuários</h5>
                                        <p class="card-text">Listagem, Remoção, Cadastro e Alteração dos funcionários.</p>
                                        <a href="/usuarios" class="btn btn-primary" aria-disabled="true"><ion-icon name="people-outline"></ion-icon> Usuários</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Meu cadastro</h5>
                                        <p class="card-text">Complete seu cadastro e também altere sua senha!</p>
                                        <a href="/minhaconta/{{ Auth::user()->id }}" class="btn btn-primary" disabled
                                            aria-disabled="true">Minha
                                            conta</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
