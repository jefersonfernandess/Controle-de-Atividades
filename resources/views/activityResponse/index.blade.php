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
    @include('layouts.navbar')
    <div class="container mt-4">
        @if (session('success'))
            <p class="alert alert-success text-center mt-2">{{ session('success') }}</p>
        @endif
        @if (session('errors'))
            <p class="alert alert-danger text-center mt-2">{{ session('errors') }}</p>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nome do aluno</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Situação da atividade</th>
                    <th scope="col"><i class="fa fa-cogs" aria-hidden="true"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activitiesResponses as $activityResponse)
                    <tr>
                        <td>{{ $activityResponse->User->name }}</td>
                        <td>{{ $activityResponse->note }}</td>
                        @if ($activityResponse->check == true)
                            <td><i>Corrigida</i></td>
                            <td>
                                <a href="{{ route('responseacty.show', $activityResponse->id) }}"
                                    class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    Editar</a>
                            </td>
                        @else
                            <td><i>Esperando correção</i></td>
                            <td>
                                <a href="{{ route('responseacty.show', $activityResponse->id) }}"
                                    class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>
                                    Corrigir</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
