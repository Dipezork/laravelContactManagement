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

                        <h1>Editar Contato</h1>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Editar Informações do Contato</h5>

                                <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nome:</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ $contact->name }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="contact" class="form-label">Contato:</label>
                                        <input type="text" class="form-control" name="contact" id="contact" value="{{ $contact->contact }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $contact->email }}">
                                    </div>

                                    <div class="mt-8">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-secondary">Voltar</a>
                                </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </main>
            </div>
        </div>
    </body>
@endsection
