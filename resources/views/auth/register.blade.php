@extends('layouts.master')

@section('title', 'Registrar Professor')
<style>
    body {
        background-image: url(" {{ asset('img/bg.jpg') }}");
        background-size: cover;
        background-repeat: no-repeat;
    }

    .content {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin: 10 auto;
        height: 95%;
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

    .form-register input {
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
        <form id="form" class="form-register" action="{{ route('authregister.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <h2>Registro</h2>
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
                    <button class="btn btn-dark" type="submit">Registrar</button>
                </div>
            </div>
            @if (session('fail'))
                <div class="row">
                    <div class="col d-flex justify-content-center ">
                        <p class="errorMessage">{{ session('fail') }}</p>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <p>tem uma conta? clique <a href="{{ route('authlogin.index') }}">aqui</a> para fazer login</p>
                </div>
            </div>
        </form>
    </div>
@endsection