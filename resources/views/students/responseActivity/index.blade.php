@extends('layouts.master')

@section('titulo', 'Responder aividade')
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
        <form class="content" action="" method="POST">
            @csrf
            <div class="row mt-2">
                <div class="col text-center">
                    <h2>Responder atividade</h2>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col d-flex flex-column text-center data-response">
                    <label for="name">Nome do aluno</label>
                    <input class="text-center" type="text" name="name" value=""
                        disabled>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col d-flex flex-column text-center data-response">
                    <label for="name">Resposta do aluno</label>
                    <input class="text-center" type="text" name="name" value=""
                        disabled>
                </div>
            </div>
            <div class="row mt-3">
                
            </div>
            <div class="row mt-2">
                <div class="col text-center mt-4">
                    <button class="btn subtmit-button" name="download" style="background-color: #fb8351;"
                        type="submit">Finalizar atividade</button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
