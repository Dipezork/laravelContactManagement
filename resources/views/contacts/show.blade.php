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

                        <h1>Detalhes do Contato</h1>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Informações do Contato</h5>
                                <p class="card-text"><strong>Nome:</strong> {{ $contact->name }}</p>
                                <p class="card-text"><strong>Contato:</strong> {{ $contact->contact }}</p>
                                <p class="card-text"><strong>Email:</strong> {{ $contact->email }}</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">Editar</a>

                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>

                            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Voltar</a>
                        </div>

                    </div>
                </main>
            </div>
        </div>
    </body>
@endsection
