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
                                        <h5 class="card-title">Bater Ponto</h5>
                                        <p class="card-text">Clique no botão para resgistrar seu ponto.</p>
                                        <button class="btn btn-success btn-md active button dis" role="button"
                                            aria-pressed="true">
                                            <ion-icon name="time-outline"></ion-icon> Registrar Ponto
                                        </button>
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
    <!-- Adicionando Javascript -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".button").click(function() {

            $(".button").removeClass("btn-success").addClass("btn-secondary").attr("disabled", true);

            $.ajax({
                type: "get",
                url: "/getByPonto",
                dataType: "json",
                data: {
                    status: true
                },
                success: function(data) {

                    if (data.sucesso == 0) {

                        $(".data").text(data.data);
                        $(".hora").text(data.hora);
                        $('.alert').attr('style', 'display:show');

                        setTimeout(function() {
                            $(".button").removeClass("btn-secondary").addClass("btn-success")
                                .attr("disabled", false);
                            $('.alert').slideUp('slow');
                            $(".data").text();
                            $(".hora").text();
                        }, 3000).slideUp('slow');;
                    }
                },
            });
        });

    </script>
@endsection
