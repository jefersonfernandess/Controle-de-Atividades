@extends('layouts.master')

@section('titulo', 'Atividades - Todas')
<style>
    /*
            font-family: 'Montserrat', sans-serif;
            font-family: 'Roboto', sans-serif;
    */

    .border-none {
        border: none !important;
        background: none;
    }

    .card {
        border: 1px solid #8f8f8f !important;
    }

    .card-diciplines {
        width: inherit;
        height: 20rem;
        border: 1px solid black;
        border-radius: 1rem;
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

    .fileinput {
        font-size: 0.8rem !important;
    }

    .form-register button {
        width: 100%
    }

    .errorMessage {
        color: red;
    }

    th {
        font-family: 'Montserrat', sans-serif;
        font-weight: 300;
    }

    td {
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
        font-size: 1.2rem;
    }
</style>
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                aria-controls="offcanvasExample">
                <i class="fa fa-bars" aria-hidden="true"></i> Menu
            </a>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <a href="/">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Home</h5>
                    </a>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="d-flex flex-column">
                        <a href="{{ route('activity.index') }}">Atividades</a>
                        <a href="{{ route('activity.create') }}">Criar atividade</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col-4">Nome da atividade</th>
                        <th scope="col-4">Professor responsavel</th>
                        <th scope="col-2">Diciplina da atividade</th>
                        <th scope="col-2"><i class="fa fa-cogs" aria-hidden="true"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity->name }}</td>
                            <td>{{ $activity->User->name }}</td>
                            <td>{{ $activity->Dicipline->name }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <div>
                                        <!-- Start modal show-->
                                        <button type="button" class="btn btn-info" style="color: black !important;"
                                            data-bs-toggle="modal" data-bs-target="#showModal-{{ $activity->id }}"><i
                                                class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                        @include('activity.modal.showModal')
                                        <!-- End modal show-->
                                    </div>
                                    <div>
                                        <a class="btn btn-warning" href="{{ route('activity.edit', $activity->id) }}"><i
                                                class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <form action="{{ route('activity.destroy', $activity->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"
                                                    aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row mt-2">
            </div>
        </div>
    </main>

@endsection
