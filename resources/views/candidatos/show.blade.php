@extends('layout')

@section('content')
    <h1>Detalhes do Candidato</h1>
    <p><strong>Nome:</strong> {{ $candidato->nome }}</p>
    <p><strong>Email:</strong> {{ $candidato->email }}</p>
    <p><strong>Experiência:</strong> {{ $candidato->experiencia }}</p>
    <a href="{{ route('candidatos.edit', $candidato) }}">Editar</a><br><br>
    <a href="/">Voltar à Página Principal</a>

@endsection
