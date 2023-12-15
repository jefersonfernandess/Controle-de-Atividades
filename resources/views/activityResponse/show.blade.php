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
        <div class="row">
                
        </div>
    </div>
    </div>
@endsection
