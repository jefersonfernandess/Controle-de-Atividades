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
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .donwload {
        width: 20rem;
    }

    .note {
        font-size: 1.5rem;
        width: 3rem;
        height: 2rem;
        border: none;
    }
    .check-input {
        font-size: 0.5rem;
        width: 2rem;
        height: 2rem;
        border: none;
    }

    .donwload-button {
        border: 1px solid #e9e2da;
    }

    .donwload-button:hover {
        border: 1px solid #fb8351;
        transition: 400ms;
    }

    .subtmit-button {
        width: 30rem;
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
            <div class="row mt-3">
                <div class="response-teacher">
                    <div class="text-center donwload">
                        <label for="download">Arquivos enviado pelo aluno</label>
                        <button class="donwload-button link-dark" name="download" type="submit"><i class="fa fa-download" aria-hidden="true"></i>   Download</button>
                    </div>
                    <div class="text-center d-flex flex-column">
                        <label for="note">Nota</label>
                        <input class="text-center note" type="text" name="note">
                    </div>
                    <div class="text-center d-flex flex-column me-5">
                        <label for="check">Visto</label>
                        <input class="check-input" type="checkbox" name="check">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col text-center mt-4">
                    <button class="btn subtmit-button" name="download" style="background-color: #fb8351;"
                        type="submit">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
