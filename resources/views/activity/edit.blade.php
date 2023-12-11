@extends('layouts.master')

@section('titulo', 'Criar atividade - Atividade')
<style>
    body {
        background-image: linear-gradient(to bottom, #f0a818, #f3ba39, #f6cb54, #fadb6f, #ffeb89);
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 100vh;
    }

    .content {
        display: flex;
        width: 100%;
        margin: 10 auto;
        height: 40%;
        justify-content: center;
        align-items: center;
    }

    .form-content {
        width: 80%;
        height: 0 auto;
        padding: 2rem;
        border: 0.5rem solid #f0a818;
        border-radius: 0.5rem;
        background-color: #fdfaeb;
    }

    .form-register h2 {
        font-family: 'Montserrat', sans-serif;
    }

    .form-register input {
        font-family: 'Roboto', sans-serif;
        font-size: 1.2rem;
        padding: 0.5rem;
    }
</style>
@section('content')
    <div class="container">
        <div class="content">
            <form class="form-content" action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" style="background-color: #f0a818;" href="#" role="button"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('site.index') }}">Home</a></li>
                            <li><a class="dropdown-item" href="{{ route('activity.index') }}">Atividades</a></li>
                        </ul>
                    </div>
                    <h2 class="text-center mb-4"><i>Crie sua nova atividade</i></h2>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="d-flex flex-column mb-3 mt-1">
                            <label class="text-center" for="name"><b>Nome da atividade</b></label>
                            <input type="text" name="name" id="name" value="{{ $activity->name }}">
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <label class="text-center" for="dicipline"><b>Diciplina da atividade</b></label>
                            <select name="dicipline" id="dicipline" class="js-user-option">
                                <option selected value="{{ $activity->dicipline_id }}"></option>
                                @foreach ($diciplines as $dicipline)
                                    <option value="{{ $dicipline->id }}">{{ $dicipline->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="text-center" for="file"><b>Anexar arquivos da atividade</b></label>
                            <input class="form-control" type="file" id="formFile" name="filesActivities">
                        </div>
                        
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column keditor">
                            <label class="text-center" for="editor"><b>Descrição da atividade</b></label>
                            <textarea name="editor" id="editor"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <button class="btn" style="background-color: #f0a818;" type="submit">Criar atividade</button>
                </div>
            </form>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
