@extends('layouts.master')

@section('titulo', 'Respostas atividades - Todos')
<style>
    .border-none {
        border: none !important;
        background: none;
    }

    .main-content {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 90vh;
    }

    .content {
        width: 40rem;
        height: 25rem;
        padding: 1rem;
        background-color: #e9e2da;
        border: 1px solid black;
        border-radius: 0.3rem;
    }

    .content h2 {
        font-family: 'Roboto', sans-serif;
    }

    .content input,
    label {
        font-family: 'Montserrat', sans-serif;
    }

    .data-response input {
        font-size: 1.5rem;
    }

    .data-response input {
        background-color: white;
        width: 30rem;
        margin: auto;
        border: none;
        border-radius: 0.3rem;
    }

    .response-teacher {
        width: 30rem;
        margin: auto;
        border: none;
        border-radius: 0.3rem;
    }

    .note {
        align-self: center;
        font-size: 1.5rem;
        width: 3rem;
        height: 2rem;
        border: none;
    }

    .check {
        align-self: center;
        font-size: 0.5rem;
        width: 2rem;
        height: 2rem;
        border: none;
    }

    .subtmit-button {
        width: 100%;
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
    <div class="main-content">
        <div class="content">
            <div class="row mt-2">
                <div class="col text-center">
                    <h2>Avaliar atividade</h2>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col d-flex flex-column text-center data-response">
                    <label for="name">Nome do aluno</label>
                    <input class="text-center" type="text" name="name" value="{{ $activityResponse->User->name }}"
                        disabled>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col d-flex flex-column text-center data-response">
                    <label for="name">Resposta do aluno</label>
                    <input class="text-center" type="text" name="name" value="{{ $activityResponse->description }}"
                        disabled>
                </div>
            </div>
            <div class="row mt-2 response-teacher">
                <div class="col d-flex flex-column text-center">
                    <label for="download">Arquivos enviado pelo aluno</label>
                    <button class="btn" name="download" style="background-color: #fb8351;"
                        type="submit">Download</button>
                </div>
                <div class="col d-flex flex-column text-center">
                    <label for="note">Nota</label>
                    <input class="text-center note" type="text" name="note">
                </div>
                <div class="col d-flex flex-column text-center">
                    <label for="check">Visto</label>
                    <input class="check" type="checkbox" name="check">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col text-center">
                    <button class="btn subtmit-button" name="download" style="background-color: #fb8351;"
                        type="submit">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
