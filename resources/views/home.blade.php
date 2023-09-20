@extends('app', ['titulo' => 'Produtos'])
@section('content')
    <div class="card mx-3 my-3 mt-2 ">
        <div class="row card-body">
            <div class="col-12 d-flex justify-content-end mb-2">
                <input class="mr-4" type="text" id="filtro-nome" placeholder="Pesquisar por nome">
                <a href="{{route('create-produto')}}" type="button" class="btn btn-success">Cadastrar</a>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#Identificador</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <th scope="row">{{$produto->id}}</th>
                            <td >
                                @if(strlen($produto->nome) > 20)
                                    {{ substr($produto->nome, 0, 20) . '...' }}
                                @else
                                    {{ $produto->nome }}
                                @endif
                            </td>
                            <td>R${{$produto->preco}}</td>
                            <td>{{$produto->quantidade}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Opções
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item " href="{{route('show-produto', $produto->id)}}"><i class="fas fa-eye"></i><bold>Ver</bold></a>
                                        <a class="dropdown-item " href="{{route('edit-produto', $produto->id)}}"><i class="fas fa-edit"></i><bold>Editar</bold></a>
                                        <form action="{{ route('delete-produto', $produto->id) }}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=" dropdown-item btn btn-link mb-0"
                                                    title="Deletar" onclick="return confirm('Deseja executar ação na atividade?')">
                                                <i class="fas fa-trash"></i>Excluir
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function () {
        $('#filtro-nome').on('input', function () {
            var termoPesquisa = $(this).val().toLowerCase();
            $('tbody tr').each(function () {
                var nomeProduto = $(this).find('td:eq(0)').text().toLowerCase();
                if (nomeProduto.includes(termoPesquisa)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });

</script>
@endsection
