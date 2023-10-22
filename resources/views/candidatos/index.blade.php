@extends('layout')

@section('content')
    <h1>Lista de Candidatos</h1>    

    @if(count($candidatos) > 0)
        <ul>
            @foreach($candidatos as $candidato)
                <li>
                    {{ $candidato->nome }} - {{ $candidato->email }}
                    <a href="{{ route('candidatos.show', $candidato->id) }}">Detalhes</a>
                    <a href="{{ route('candidatos.edit', $candidato->id) }}">Editar</a>
                    <form action="{{ route('candidatos.destroy', $candidato->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Excluir</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>Nenhum candidato encontrado.</p>
    @endif
    <a href="{{ route('candidatos.create') }}">Criar Novo Candidato</a><br><br>
    <a href="/">Voltar à Página Principal</a>

@endsection