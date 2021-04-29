@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fas fa-calendar-check"></i> Buscar registros usuário</h3>
                </div>
                <div class="card-body">
                    <form action="/usuarios/search" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-5">
                                <label>Data Inicial</label>
                                <input id="data_inicial" type="date"
                                    class="form-control @error('data_inicial') is-invalid @enderror" name="data_inicial" @if (isset($data_inicial)) value="{{ $data_inicial }}" @else value="{{ old('data_inicial') }}" @endif required>
                            </div>
                            <div class="col-5">
                                <label>Data Final</label>
                                <input id="data_final" type="date"
                                    class="form-control @error('data_final') is-invalid @enderror" name="data_final" @if (isset($data_final)) value="{{ $data_final }}" @else value="{{ old('data_inicial') }}" @endif required>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary float-right" style="margin-top: 30px"><i
                                        class="fas fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    @if (isset($usuarios))
                        @if (count($usuarios) > 0)
                            
                            <table class="table table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">ID </th>
                                        <th scope="col">Nome </th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">Superior</th>
                                        <th scope="col">Idade</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->id }}</td>
                                            <td>{{ $usuario->nome }}</td>
                                            <th>{{ $usuario->cargo }}</th>
                                            <th> {{ $usuario->superior }}</th>
                                            <th>{{ $usuario->idade }}</th>
                                            <th>{{ date('d/m/Y', strtotime($usuario->data)) }}</th>
                                            <th> {{ $usuario->hora }}</th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h5>Não foi encontrado registro para esse periodo!</h5>
                        @endif
                    @endif
                </div>
                <div class="card-footer">
                    <a type="button" href="/home" class="btn btn-secondary btn-sm">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
