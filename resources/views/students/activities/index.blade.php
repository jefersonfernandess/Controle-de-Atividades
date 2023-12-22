@extends('layouts.master')

@section('titulo', 'Atividades - Aluno')
<style>
    .border-none {
        border: none !important;
        background: none;
    }

    .card {
        border: 1px solid #8f8f8f !important;
    }
</style>
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('site.index') }}">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Respostas</a>
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Pesquise" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </nav>
    <h3 class="text-center mt-2">Atividades feitas</h3>
    <div class="container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nome do professor</th>
                    <th scope="col">Atividade proposta</th>
                    <th scope="col">Sua nota</th>
                    <th scope="col">Situação da atividade</th>
                    <th scope="col"><i class="fa fa-cogs" aria-hidden="true"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activitiesStudentes as $activity)
                    <tr>
                        <td>{{ $activity->User->name }}</td>
                        <td>{!! $activity->description !!}</td>
                        @foreach ($activity->ActivityResponse as $activityResponse)
                            @if ($activityResponse->check == true)
                                <td>{{ $activityResponse->note }}</td>
                                <td><i>Corrigida</i></td>
                                <td></td>
                            @else
                                <td><i></i></td>
                                <td><i>Esperando correção</i></td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm"><i class="fa fa-pencil"
                                            aria-hidden="true"></i> Refazer</a>
                                </td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h3 class="text-center mt-2">Atividades pendentes</h3>
    <div class="container mt-4">
        <div class="row">
            @foreach ($activities as $activity)
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $activity->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $activity->User->name }}</h6>
                            <p class="card-text">{!! $activity->description !!}</p>
                            <a href="{{ route('studentActivityResponse.index', $activity->id) }}" class="card-link">Fazer atividade</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
