@extends('layouts.app')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
    <body class="nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <!-- Conteúdo do menu lateral -->
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">

                        <h1 class="text-center">Adicionar Contato</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome:</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="contact">Contato:</label>
                                <input type="text" class="form-control" name="contact" id="contact" value="{{ old('contact') }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                            </div>

                            <br>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Adicionar Contato</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('contacts.index') }}" class="btn btn-secondary btn-lg">Voltar</a>
                        </div>

                    </div>
                </main>
            </div>
        </div>
    </body>
@endsection
