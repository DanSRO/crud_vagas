@extends('layout')

@section('content')
    <h1>Lista de Vagas</h1>

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
                    <td>{{ $vaga->ativa ? 'Sim' : 'Não' }}</td>
                    <td>
                        <a href="{{ route('vagas.edit', $vaga) }}">Editar</a>
                        <form action="{{ route('vagas.destroy', $vaga) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('vagas.create') }}">Criar Nova Vaga</a>
@endsection