@extends('layouts.master')

@section('titulo', 'Respostas atividades - Todos')
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
    <div class="container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nome do aluno</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Situação da atividade</th>
                    <th scope="col"><i class="fa fa-cogs" aria-hidden="true"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activitiesResponses as $activityResponse)
                    <tr>
                        <td>{{ $activityResponse->User->name }}</td>
                        <td>{{ $activityResponse->note }}</td>
                        @if ($activityResponse->check == true)
                            <td><i>Corrigida</i></td>
                            <td>
                                <a href="{{ route('responseacty.show', $activityResponse->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"
                                        aria-hidden="true"></i> Editar</a>
                            </td>
                        @else
                            <td><i>Esperando correção</i></td>
                            <td>
                                <a href="{{ route('responseacty.show', $activityResponse->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"
                                        aria-hidden="true"></i> Corrigir</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
