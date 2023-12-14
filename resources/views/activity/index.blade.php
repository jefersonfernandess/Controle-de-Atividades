@extends('layouts.master')

@section('titulo', 'Atividades - Todas')
<style>
    /*
            font-family: 'Montserrat', sans-serif;
            font-family: 'Roboto', sans-serif;
    */

    .border-none {
        border: none !important;
        background: none;
    }

    .card {
        border: 1px solid #8f8f8f !important;
    }

    .card-diciplines {
        width: inherit;
        height: 20rem;
        border: 1px solid black;
        border-radius: 1rem;
    }

    body {
        background-size: cover;
        background-repeat: no-repeat;
    }

    .content {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin: 10 auto;
        height: 90%;
        background-color: ;

    }

    .form-register {
        padding: 1.5rem;
        border-radius: 1rem;
    }

    .form-register label {
        font-size: 0.8rem;
    }

    .row {
        margin-bottom: 1rem;
    }

    .form-register h2 {
        font-family: 'Montserrat', sans-serif;
    }

    .form-register input {
        font-family: 'Roboto', sans-serif;
        font-size: 1.2rem;
        padding: 0.5rem;
    }

    .fileinput {
        font-size: 0.8rem !important;
    }

    .form-register button {
        width: 100%
    }

    .errorMessage {
        color: red;
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
                        <a class="nav-link active" aria-current="page" href="{{ route('activity.index') }}">Atividades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('activity.create') }}">Nova
                            atividade</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Pesquise" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col-4">Nome atividade</th>
                        <th scope="col-4">Professor responsavel</th>
                        <th scope="col-2">Diciplina da atividade</th>
                        <th scope="col-2">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity->name }}</td>
                            <td>{{ $activity->User->name }}</td>
                            <td>{{ $activity->Dicipline->name }}</td>
                            <td class="d-flex gap-2">
                                <div>
                                    <!-- Start modal show-->
                                    <button type="button" class="btn btn-info" style="color: black !important;"
                                        data-bs-toggle="modal" data-bs-target="#showModal-{{ $activity->id }}"><i
                                            class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                    @include('activity.modal.showModal')
                                    <!-- End modal show-->
                                </div>
                                <div>
                                    <a class="btn btn-warning" href="{{ route('activity.edit', $activity->id) }}"><i
                                            class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div>
                                    <form action="{{ route('activity.destroy', $activity->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row mt-2">
            </div>
        </div>
    </main>

@endsection
