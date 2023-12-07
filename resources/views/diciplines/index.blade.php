@extends('layouts.master')

@section('titulo', 'Diciplinas - Todas')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap');

    /*
            font-family: 'Montserrat', sans-serif;
            font-family: 'Roboto', sans-serif;
        */

    .border-none {
        border: none !important;
        background: none;
    }

    .card-diciplines {
        width: inherit;
        height: 20rem;
        border: 1px solid black;
        border-radius: 1rem;
    }

    .card__content__img {
        width: 24rem;
        height: 10rem;
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
                        <a class="nav-link active" aria-current="page" href="{{ route('diciplines.index') }}">Diciplinas</a>
                    </li>
                    <li class="nav-item">
                        <!-- Button trigger modal -->
                        <button type="button" class="nav-link active border-none" data-bs-toggle="modal"
                            data-bs-target="#createDiciplines">
                            Nova Diciplina
                        </button>
                        @include('diciplines.modal.createDiciplines')
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
        <div class="row mt-2">
            @foreach ($diciplines as $dicipline)
                <div class="col-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('img/matematicateste.jpg') }}" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">{{ $dicipline->name }}</h4>
                            <div class="opcoes d-flex justify-content-left aling-center gap-1">
                                <a href="#" class="btn btn-success">Vizualizar</a>
                                <a href="#" class="btn btn-warning">Editar</a>
                                <a href="#" class="btn btn-danger">Excluir</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
