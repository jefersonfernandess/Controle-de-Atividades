@extends('layouts.master')

@section('titulo', 'Teacher - Todos')
<style>
    .border-none {
        border: none !important;
        background: none;
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
                        <a class="nav-link active" aria-current="page" href="{{ route('teacher.index') }}">Professores</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link active border-none" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Novo professor
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
    <div class="container">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Diciplina</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>Diciplina</td>
                        <td class="d-flex justify-content-center align-center">
                            <!--Editar-->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#updateModal-{{ $user->id }}">
                                Editar
                            </button>
                            @include('teacher.modal.updateTeacher')
                            <!--Fim Editar-->
                            <form action="{{ route('teacher.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Apagar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('teacher.modal.createTeacher')
@endsection
