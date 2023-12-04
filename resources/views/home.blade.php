@extends('layouts.master')

@section('titulo', 'Home - Page')

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
                        <a class="nav-link active" href="#">Portal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Atividades</a>
                    </li>
                    @if ($user)
                        @if ($userRole > 2)
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Alunos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('teacher.index') }}">Professores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('diciplines.index') }}">Diciplinas</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Teste</a>
                            </li>
                        @endif
                    @endif
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
        <h1>Home</h1>
    </div>
@endsection
