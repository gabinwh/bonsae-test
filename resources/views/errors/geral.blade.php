@extends('app', ["titulo" => "Erro"])
@section('content')
    <div class="alert alert-danger">
        <p>Uma exceção ocorreu:</p>
        <p>Mensagem: {{$exc->getMessage() }}</p>
        <p>Entre em contato com a equipe de suporte informando o erro.</p>
    </div>
    <div class="col-12 d-flex justify-content-end mb-2">
        <a href="{{route('listar-produtos')}}" type="button" class="btn btn-success">Início</a>
    </div>
@endsection
