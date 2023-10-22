@extends('layout')

@section('content')
    <h1>Lista de Vagas</h1>
    <a href="{{ route('vagas.create') }}">Criar Nova Vaga</a>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Ativa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vagas as $vaga)
                <tr>
                    <td>{{ $vaga->titulo }}</td>
                    <td>{{ $vaga->descricao }}</td>
                    <td>{{ $vaga->tipo }}</td>
                    <td>{{ $vaga->ativa ? 'Ativa' : 'Pausada' }}</td>
                    <td>
                        <a href="{{ route('vagas.edit', $vaga) }}">Editar</a>
                        <form action="{{ route('vagas.destroy', $vaga) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>

                        @if($vaga->ativa)
                            <form action="{{ route('vagas.pausar', $vaga) }}" method="POST">
                                @csrf
                                <button type="submit">Pausar</button>
                            </form>
                        @else
                            <form action="{{ route('vagas.reativar', $vaga) }}" method="POST">
                                @csrf
                                <button type="submit">Reativar</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <p>Total de Vagas: {{ $vagas->total() }}</p>
    {{ $vagas->links() }}
    <br>
    <a href="/">Voltar à Página Principal</a>
@endsection

