@extends('layout')

@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas vagas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(!empty($vagas))
    @foreach($vagas as $vaga)
            <!-- Exibir informações sobre cada vaga -->
            <p>{{ $vaga->titulo }}</p>
            <p>{{ $vaga->descricao }}</p>
            <p>{{ $vaga->tipo }}</p>
            <p>{{ $vaga->ativa ? 'Ativa' : 'Pausada' }}</p>            
        @endforeach
    @else
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <p>Você ainda não tem vagas cadastradas, <a href="/vagas/create">Criar Vaga</a></p>
    @endif
</div>
@endsection
