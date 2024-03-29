@extends('layouts.master')

@section('titulo', 'Atividades - Aluno')
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
    <h3 class="text-center mt-2">Atividades feitas</h3>
    <div class="container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nome do professor</th>
                    <th scope="col">Atividade proposta</th>
                    <th scope="col">Sua nota</th>
                    <th scope="col">Situação da atividade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activityResponseTrue as $activityTrue)
                    <tr>
                        <td>{{ $activityTrue->name }}</td>
                        <td>{!! $activityTrue->description !!}</td>
                        @foreach ($activityTrue->ActivityResponse as $activityResponse)
                            @if ($activityResponse->check == false)
                                <td><i>Esperando correção (<a href="" class="link-info" data-bs-toggle="modal"
                                            data-bs-target="#responseActivity-{{ $activityResponse->id }}">ver sua
                                            resposta</a>)</i></td>
                                @include('students.activities.modal.responseActivity')
                                <td>
                                    <a href="{{ route('studentRedoActivity.edit', $activityResponse->id) }}"
                                        class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        Refazer</a>
                                </td>
                            @else
                                <td>{{ $activityResponse->note }} </i></td>
                                <td><i>Corrigida <br>(<a href="" class="link-success" data-bs-toggle="modal"data-bs-target="#responseActivity-{{ $activityResponse->id }}">ver resposta</a>)</i></td>
                                @include('students.activities.modal.responseActivity')
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h3 class="text-center mt-2">Atividades pendentes</h3>
    <div class="container mt-4">
        <div class="row">
            @foreach ($activityResponseFalse as $activityFalse)
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Atividade: {{ $activityFalse->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted"></h6>
                            <p class="card-text"></p>
                            <a href="{{ route('studentActivityResponse.index', $activityFalse->id) }}"
                                class="link-dark">Fazer atividade <i class="fa-solid fa-up-right-from-square fa-xs" style="color: #000000;"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
