@extends('layouts.app')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
    <div class="container">

        <h1>Editar Contato</h1>

        <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" value="{{ $contact->name }}">
            </div>

            <div>
                <label for="contact">Contato:</label>
                <input type="text" name="contact" id="contact" value="{{ $contact->contact }}">
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ $contact->email }}">
            </div>

            <button type="submit">Salvar</button>
        </form>

        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-primary">Voltar</a>

    </div>
@endsection
