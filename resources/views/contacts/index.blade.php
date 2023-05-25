@extends('layouts.app')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
    <div class="container">
        <h1>Lista de Contatos</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


        <a href="{{ route('contacts.create') }}" class="btn btn-primary">Adicionar Contato</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Contato</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->contact }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-primary">Ver Detalhes</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
