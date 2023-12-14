@extends('layouts.master')

@section('titulo', 'Alunos - Todos')
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
                        <a class="nav-link active" aria-current="page" href="{{ route('student.index') }}">Alunos</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link active border-none" data-bs-toggle="modal"
                            data-bs-target="#createStudent">
                            Novo Aluno
                        </button>
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
        <div class="row">
            @foreach ($users as $user)
                <div class="col-3 mb-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-user" aria-hidden="true"></i>
                                {{ $user->name }}</h5>
                            <p class="card-text"><i class="fa fa-envelope" aria-hidden="true"></i>
                                {{ $user->email }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fa fa-book" aria-hidden="true"></i>
                                Diciplina</li>
                            <li class="list-group-item"><i class="fa fa-check-square-o" aria-hidden="true"></i>
                                Atividades</li>
                            <li class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i>
                                Turma</li>
                        </ul>
                        <div class="card-body d-flex justify-content-center align-center gap-3">
                            <!--Editar-->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#updateModal-{{ $user->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Editar
                            </button>
                            @include('students.modal.updateStudent')
                            <!--Fim Editar-->
                            <!--Apagar-->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $user->id }}"><i class="fa fa-chain-broken" aria-hidden="true"></i>
                                Desvincular
                            </button>
                            @include('students.modal.deleteStudent')
                            <!--Fim Apagar-->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
    @include('students.modal.createStudent')
@endsection
