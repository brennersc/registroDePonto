@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9 col-sm-12">
                            <h4><i class="fas fa-users"></i> Usuários</h4>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="btn-group" role="group">
                                <a type="button" href="/usuarios/buscar" class="btn btn-success btn-sm float-right"><ion-icon name="search-outline"></ion-icon> Buscar</a>
                                <a type="button" href="/usuarios/create" class="btn btn-primary btn-sm float-right"><ion-icon name="add-outline"></ion-icon> Novo
                                    Usuário</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">CEP</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr class="{{ $usuario->status == true ? 'table-secondary' : '' }}">
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->cpf }}</td>
                                    <td>{{ $usuario->cargo }}</td>
                                    <td>{{ $usuario->cep }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a type="button" href="/usuarios/{{ $usuario->id }}/edit"
                                                class="btn btn-primary btn-sm">
                                                <ion-icon name="create-outline"></ion-icon> Editar
                                            </a>
                                            <a type="button" href="/usuarios/{{ $usuario->fun_id }}"
                                                class="btn btn-primary btn-sm">
                                                <ion-icon name="information-circle-outline"></ion-icon>
                                                Detalhes
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-footer">
                    <a type="button" href="/home" class="btn btn-secondary btn-sm">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
