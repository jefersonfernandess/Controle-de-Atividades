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
    <h1 class="text-center mt-2">Alunos</h1>
    <div class="container mt-4">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome do aluno</th>
                        <th scope="col">Email</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex gap-2">
                                <div>
                                    <!--Editar-->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#updateModal-{{ $user->id }}"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i>
                                        Editar
                                    </button>
                                    @include('students.modal.updateStudent')
                                    <!--Fim Editar-->
                                </div>
                                <div>
                                    <!--Apagar-->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal-{{ $user->id }}"><i class="fa fa-chain-broken"
                                            aria-hidden="true"></i>
                                        Desvincular
                                    </button>
                                    @include('students.modal.deleteStudent')
                                    <!--Fim Apagar-->
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('students.modal.createStudent')
@endsection
