@extends('layouts.master')

@section('title', 'Registrar Professor')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap');

    /*
        font-family: 'Montserrat', sans-serif;
        font-family: 'Roboto', sans-serif;
    */

    body {}

    .img {
        background-size: cover;
        background-repeat: no-repeat;
        background-image: url(" {{ asset('img/bg4.jpg') }}");
    }

    .content {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        height: 100%;
    }

    .form-register {
        background-color: rgb(238, 238, 238);
        padding: 1.5rem;
        border: 1px solid black;
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

    .form-register button {
        width: 100%
    }

    .errorMessage {
        color: red;
    }
</style>
@section('content')
    @include('layouts.navbar')
    <div class="img">
        <div class="container content">
            <form id="form" class="form-register" action="{{ route('teacher.updateRole') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <h2>Escolha o Usuário</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex flex-column justify-content-center">
                        <select name="userId" id="teacher" class="js-user-option">
                            <option disabled selected></option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if (session('errors'))
                    @foreach ($errors->all() as $erro)
                    <div class="row">
                        <p class="text-center mt-1 errorMessage">{{ $erro }}</p>
                    </div>
                    @endforeach
                @endif
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <button class="btn btn-dark" type="submit">Tornar professor</button>
                    </div>
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
    </script>
@endsection
