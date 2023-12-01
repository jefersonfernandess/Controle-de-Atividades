@extends('layouts.master')

@section('titulo', 'Diciplinas - Todas')
<style>
    .card-diciplines {
        width: 25rem;
        height: 20rem;
        border: 1px solid black;
        border-radius: 1rem;
    }

    .card__content__img {
        width: 24rem;
        height: 10rem;
    }
    
</style>
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarCenteredExample"
                aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
                <!-- Left links -->
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('diciplines.index') }}">Diciplinas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Criar diciplina</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled"></a>
                    </li>
                    @if (!$user)
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('authlogin.index') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('authregister.index') }}">Registro</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Olá {{ $user->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <form action="{{ route('authlogout.logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Sair</button>
                                </form>
                            </ul>
                        </li>
                    @endif

                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card" style="width:27rem;">
                    <img class="card-img-top" src="{{ asset('img/matematicateste.jpg') }}" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Nome diciplina</h4>
                        <p class="card-text">Professor diciplina</p>
                        <div class="opcoes d-flex justify-content-left aling-center gap-1">
                            <a href="#" class="btn btn-success">Vizualizar</a>
                            <a href="#" class="btn btn-warning">Editar</a>
                            <a href="#" class="btn btn-danger">Excluir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
