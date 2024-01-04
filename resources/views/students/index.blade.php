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
    @include('layouts.navbar')
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
                            <li class="list-group-item">
                                <i class="fa fa-check-square-o" aria-hidden="true"></i> Atividades
                            </li>
                        </ul>
                        <div class="card-body d-flex justify-content-center align-center gap-3">
                            <!--Editar-->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#updateModal-{{ $user->id }}"><i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i>
                                Editar
                            </button>
                            @include('students.modal.updateStudent')
                            <!--Fim Editar-->
                            <!--Apagar-->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $user->id }}"><i class="fa fa-chain-broken"
                                    aria-hidden="true"></i>
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
    @include('students.modal.createStudent')
@endsection
