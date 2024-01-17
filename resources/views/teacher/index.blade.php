@extends('layouts.master')

@section('titulo', 'Professores - Todos')
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome do professor</th>
                        <th scope="col">Email</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->email }}</td>
                            <td class="d-flex gap-2">
                                <div>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#updateModal-{{ $user->id }}"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i>
                                        Editar
                                    </button>
                                    @include('teacher.modal.updateTeacher')
                                </div>
                                <div>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal-{{ $user->id }}"><i class="fa fa-trash"
                                            aria-hidden="true"></i>
                                        Apagar
                                    </button>
                                    @include('teacher.modal.deleteTeacher')
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>  
@endsection
