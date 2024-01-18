@extends('layouts.master')

@section('titulo', 'Respostas atividades - Todos')
<style>
    .border-none {
        border: none !important;
        background: none;
    }

    .main-content {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 90vh;
    }

    .content {
        width: 40rem;
        height: 25rem;
        padding: 1rem;
        background-color: #e9e2da;
        border: 1px solid black;
        border-radius: 0.3rem;
    }

    .content h2 {
        font-family: 'Roboto', sans-serif;
    }

    .content input,
    label {
        font-family: 'Montserrat', sans-serif;
    }

    .data-response input {
        font-size: 1.5rem;
    }

    .student-response {
        background-color: white;
        width: 30rem;
        margin: auto;
        border: none;
        border-radius: 0.3rem;
    }

    .data-response input {
        background-color: white;
        width: 30rem;
        margin: auto;
        border: none;
        border-radius: 0.3rem;
    }

    .response-teacher {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .donwload {
        width: 20rem;
    }

    .note {
        font-size: 1.2rem;
        width: 3rem;
        height: 2rem;
        border: none;
    }

    .check-input {
        font-size: 0.5rem;
        width: 2rem;
        height: 2rem;
        border: none;
    }

    .donwload-button {
        border: 1px solid #e9e2da;
    }

    .donwload-button:hover {
        border: 1px solid #fb8351;
        transition: 400ms;
    }

    .subtmit-button {
        width: 30rem;
    }
</style>
@section('content')
    @include('layouts.navbar')
    <div class="main-content">
        <form class="content" action="{{ route('responseacty.store', $activityResponse->id) }}" method="POST">
            @csrf
            <div class="row mt-2">
                <div class="col text-center">
                    <h2>Avaliar atividade</h2>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col d-flex flex-column text-center data-response">
                    <label for="name">Nome do aluno</label>
                    <input class="text-center" type="text" name="name" value="{{ $activityResponse->User->name }}"
                        disabled>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col d-flex flex-column text-center data-response">
                    <label for="name">Resposta do aluno</label>
                    <div class="student-response">
                        {!! $activityResponse->description !!}
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="response-teacher">
                    <div class="text-center donwload">
                        <label for="download">Arquivos enviado pelo aluno: <b>1</b></label>
                        <button class="donwload-button link-dark" name="download" type="submit"><i class="fa fa-download"
                                aria-hidden="true"></i> Download</button>
                    </div>
                    <div class="text-center d-flex flex-column">
                        <label for="note">Nota</label>
                        <input class="text-center note" type="number" name="note" id="noteInput" step="0.1"
                            min="0" max="10">
                    </div>
                    <div class="text-center d-flex flex-column me-5">
                        <label for="check">Visto</label>
                        <input class="check-input" type="checkbox" name="check">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col text-center mt-4">
                    <button class="btn subtmit-button" name="download" style="background-color: #fb8351;"
                        type="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <script>
        
    </script>
@endsection
