@extends('app', ['titulo' => 'Visualizar produto'])
@section('content')
    <div class="row mb-3">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                   <b> Identificador:</b> {{$produto->id}}
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <b> Nome:</b> {{$produto->nome}}
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <b>Preço:</b> R${{$produto->preco}}
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <b>Quantidade:</b> {{$produto->quantidade}}
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="form-group col-12">
            <div class="card">
                <div class="card-body">
                    <b>Descrição:</b> {{$produto->descricao}}
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2 justify-content-end">
        <div class="text-center col-auto">
            <a href="{{ route('listar-produtos') }}" class="btn btn-warning btn-md w-100 mt-4 mb-2">
                Voltar
            </a>
        </div>
        <div class="text-center col-auto">
            <button id="botaoEnviar" type="submit" class="btn btn-success btn-md w-100 mt-4 mb-2">Enviar</button>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#meuForm").submit(function(event) {
                // Desabilitar o botão de envio
                $("#botaoEnviar").prop("disabled", true);
            });
        });
    </script>
@endpush
