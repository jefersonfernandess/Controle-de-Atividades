@extends('layouts.master')

@section('titulo', 'Criar atividade - Atividade')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap');

    body {
        //background-image: linear-gradient(to bottom, #f0a818, #f3ba39, #f6cb54, #fadb6f, #ffeb89);
        background-image: linear-gradient(to top, #fb8351, #fc8b53, #fd9356, #fd9b5a, #fea35e, #fdac69, #fbb474, #fabc80, #f6c696, #f2d0ac, #eed9c3, #e9e2da);
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
        border: 0.5rem solid #fb8351;
        border-radius: 0.5rem;
        background-color: #e9e2da;
    }

    .form-content h2 {
        font-family: 'Montserrat', sans-serif;
    }

    .form-content input {
        font-family: 'Roboto', sans-serif;
        font-size: 1.2rem;
    }

    .form-content label {
        font-family: 'Montserrat', sans-serif;
    }
</style>
@section('content')
    <div class="container">
        <div class="content">
            <form class="form-content" action="{{ route('activity.update', $activity->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" style="background-color: #fb8351;" href="#" role="button"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('site.index') }}">Home</a></li>
                            <li><a class="dropdown-item" href="{{ route('activity.index') }}">Atividades</a></li>
                        </ul>
                    </div>
                    <h2 class="text-center mb-4">Atualizar atividade</h2>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="d-flex flex-column mb-3 mt-1">
                            <label class="text-center" for="name">Nome da atividade</label>
                            <input type="text" name="name" id="name" value="{{ $activity->name }}">
                        </div>
                        <div class="d-flex flex-column mb-3">
                            <label class="text-center" for="dicipline">Diciplina da atividade</label>
                            <select name="dicipline" id="dicipline" class="js-user-option">
                                @foreach ($diciplines as $dicipline)
                                    @if ($dicipline->id == $activity->dicipline_id)
                                        <option selected value="{{ $activity->dicipline_id }}">{{ $dicipline->name }}
                                        </option>
                                    @else
                                        <option value="{{ $dicipline->id }}">{{ $dicipline->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column">
                            <label class="text-center" for="file">Anexar arquivos da atividade</label>
                            <input class="form-control" type="file" id="formFile" name="filesActivities">
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column keditor">
                            <label class="text-center" for="editor">Descrição da atividade</label>
                            <textarea name="editor" id="editor">{{ $activity->description }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <button class="btn" style="background-color: #fb8351;" type="submit">Atualizar atividade</button>
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
