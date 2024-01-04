@extends('layouts.master')

@section('titulo', 'Teacher - Todos')
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
                            <li class="list-group-item"><i class="fa fa-book" aria-hidden="true"></i>
                                Diciplina</li>
                            <li class="list-group-item"><i class="fa fa-check-square-o" aria-hidden="true"></i>
                                Atividades</li>
                            <li class="list-group-item"><i class="fa fa-users" aria-hidden="true"></i>
                                Turma</li>
                        </ul>
                        <div class="card-body d-flex justify-content-center align-center gap-3">
                            <!--Editar-->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#updateModal-{{ $user->id }}"><i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i>
                                Editar
                            </button>
                            @include('teacher.modal.updateTeacher')
                            <!--Fim Editar-->
                            <!--Apagar-->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $user->id }}"><i class="fa fa-trash"
                                    aria-hidden="true"></i>
                                Apagar
                            </button>
                            @include('teacher.modal.deleteTeacher')
                            <!--Fim Apagar-->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
