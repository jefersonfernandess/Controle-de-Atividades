@extends('layouts.master')

@section('titulo', 'Diciplinas - Todas')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap');

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
</style>
@section('content')
    @include('layouts.navbar')
    <div class="container">
        <div class="row mt-2">
            @foreach ($diciplines as $dicipline)
                <div class="col-3">
                    <div class="card">
                        <h2 class="text-center mt-2">{{ $dicipline->name }}</h2>
                        <div class="card-body">
                            <div class="opcoes d-flex justify-content-center aling-center gap-1">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editDiciplines-{{ $dicipline->id }}">
                                    Editar
                                </button>
                                @include('diciplines.modal.editDiciplines')
                                <!-- End -->
                                <!-- Button delete modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteDiciplines-{{ $dicipline->id }}">
                                    Excluir
                                </button>
                                @include('diciplines.modal.destroyDiciplines')
                                <!-- End -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
