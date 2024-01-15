@extends('layouts.master')

@section('titulo', 'Responder aividade')
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
        height: 40rem;
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

    .proposed-activity {
        background-color: white;
        border: 1px solid none;
        border-radius: 0.5rem;
        width: 30rem;
    }

    .proposed-activity div {}

    .activity-response {
        width: 30rem;
        height: 10rem;
    }

    .data-response input {
        font-size: 1.5rem;
    }

    .data-response input {
        background-color: white;
        width: 30rem;
        margin: auto;
        border: none;
        border-radius: 0.3rem;
    }

    .files {
        width: 30rem;
    }

    .subtmit-button {
        width: 30rem;
    }
</style>
@section('content')
    @include('layouts.navbar')
    <div class="main-content">
        <form class="content" action="{{ route('studentActivityReponse.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-2">
                <div class="col text-center">
                    <h2>Responder atividade</h2>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col d-flex flex-column text-center data-response">
                    <input class="text-center" type="text" name="user" value="{{ $user->id }}" hidden>
                    <input class="text-center" type="text" name="activity_id" value="{{ $activity->id }}" hidden>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col d-flex justify-content-center text-center">
                    <div class="proposed-activity">
                        <p><b>Atividade proposta</b></p>
                        <div>
                            {!! $activity->description !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="d-flex justify-content-center aling-center">
                        <div class="text-center activity-response keditor">
                            <label class="text-center" for="editor">Responder atividade</label>
                            <textarea name="editor" id="editor" rows="5" cols="33"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <div class="d-flex justify-content-center aling-center">
                        <div class="text-center files">
                            <label class="text-center" for="file">Anexar arquivos da atividade</label>
                            <input class="form-control form-control-sm" type="file" id="formFile"
                                name="filesActivities">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col text-center">
                    <div class="submit-button">
                        <button class="btn subtmit-button text-center" style="background-color: #fb8351;"
                            type="submit">Finalizar atividade</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('.js-user-option').select2();
        });

        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
