@extends('layouts.master')

@section('title', 'Registrar Professor')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap');

    /*
        font-family: 'Montserrat', sans-serif;
        font-family: 'Roboto', sans-serif;
    */

    body {
        background-image: url(" {{ asset('img/bg5.jpg') }}");
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
    <div class="container content">
        <form id="form" class="form-register" action="{{ route('student.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h2>Registrar Aluno</h2>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex flex-column justify-content-center">
                    <input type="text" name="name" id="name" placeholder="Nome" value="{{ old('name') }}">
                    @error('name')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col d-flex flex-column justify-content-center">
                    <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col d-flex flex-column justify-content-center">
                    <input type="password" name="password" id="password" placeholder="Senha">
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <button class="btn btn-dark" type="submit">Registrar aluno</button>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center aling-center">
                    <div>
                        <i class="fa-solid fa-circle-chevron-left fa-sm" style="color: #000000;"></i> <a href="javascript:history.back()" class="link-secondary">Voltar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.write('<a href="' + document.referrer + '">Go Back</a>');
    </script>
@endsection
