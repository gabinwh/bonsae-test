@extends('app', ['titulo' => 'Cadastrar produto'])
@section('content')
    <form method="POST" id="meuForm" action="{{ route('store-produto') }}">
        @csrf
        @method('post')
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="nome">Nome<span style="color:red;">*</span></label>
                    <input
                        required type="text" class="form-control" id="nome" name="nome"
                        placeholder="Nome do produto"/>
                    @if ($errors->has('nome'))
                        <div>
                            <span class="invalido">{{$errors->first('nome')}}</span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="nome">Preço<span style="color:red;">*</span></label>
                    <input
                        required type="text" class="dinheiro form-control" id="preco" name="preco"
                        placeholder="Preço do produto"/>
                    @if ($errors->has('preco'))
                        <div>
                            <span class="invalido">{{$errors->first('preco')}}</span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="nome">Quantidade<span style="color:red;">*</span></label>
                    <input
                        required type="number" class="form-control" id="quantidade" name="quantidade"
                        placeholder="Quantidade do produto"/>
                    @if ($errors->has('quantidade'))
                        <div>
                            <span class="invalido">{{$errors->first('quantidade')}}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label for="nome">Descrição<span style="color:red;">*</span></label>
                <input
                    required type="text" class="form-control" id="descricao" name="descricao"
                    placeholder="Descrição do produto"/>
                @if ($errors->has('descricao'))
                    <div>
                        <span class="invalido">{{$errors->first('descricao')}}</span>
                    </div>
                @endif
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
    </form>
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
