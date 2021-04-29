@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9 col-sm-12">
                            <h4>Usuário - {{ $usuario->name }} </h4>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="btn-group float-right" role="group" aria-label="Basic example">
                                <a href="{{ $usuario->id }}/edit/" class="btn btn-sm btn-outline-primary "><ion-icon name="create-outline"></ion-icon> Editar</a>
                                <form action="{{ $usuario->id }}" method="POST">
                                    @csrf @method('DELETE')
                                       <button type="submit" class="btn btn-sm btn-outline-danger "><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <h5><b>Email</b> - {{ $usuario->email }}</h5>
                        </div>
                        <div class="col-md-6 col-12">
                            <h5><b>CPF</b> - {{ $usuario->cpf }}</h5>
                        </div>
                        <div class="col-md-6 col-12">
                            <h5><b>Cargo</b> - {{ $usuario->cargo }}</h5>
                        </div>
                        <div class="col-md-6 col-12">
                            <h5><b>Data de Nascimento</b> - {{ date('d/m/Y', strtotime($usuario->nascimento)) }}</h5>
                        </div>
                        <div class="col-md-6 col-12">
                            <h5><b>CEP</b> - {{ $usuario->cep }}</h5>
                        </div>
                        <div class="col-md-6 col-12">
                            <h5><b>Rua</b> - {{ $usuario->rua }}</h5>
                        </div>
                        <div class="col-md-6 col-12">
                            <h5><b>Bairro</b> - {{ $usuario->bairro }}</h5>
                        </div>
                        <div class="col-md-6 col-12">
                            <h5><b>Cidade</b> - {{ $usuario->cidade }}</h5>
                        </div>
                        <div class="col-md-6 col-12">
                            <h5><b>Estado</b> - {{ $usuario->estado }}</h5>
                        </div>
                        <div class="col-md-6 col-12">
                            <h5><b>Superior</b> - {{ $usuario->supe }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <h5> <b>Pontos - </b></h5>
                        </div>
                        <div class="col-md-9 col-12">
                            @foreach ($pontos as $ponto)
                                <h6 class="ml-3"><b><ion-icon name="time-outline"></ion-icon></b> Dia {{ date('d/m/Y', strtotime($ponto->data )) }} - hora {{ date('H:m', strtotime($ponto->hora )) }}</h5>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a type="button" href="JavaScript: window.history.back();" class="btn btn-secondary btn-sm">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
