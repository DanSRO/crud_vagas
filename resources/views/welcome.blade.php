@extends('layout')
@section('content')
    <h1>Bem-vindo ao Sistema de Vagas e Candidatos</h1>
    <p>
        <a href="{{ route('vagas.index') }}">Ir para a Lista de Vagas</a><br><br>
        <a href="{{ route('candidatos.index') }}">Ir para a Lista de Candidatos</a>
    </p>
@endsection