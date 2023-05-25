@extends('layouts.app')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
    <div class="container">

        <h1>Adicionar Contato</h1>

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
            <div>
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div>
                <label for="contact">Contato:</label>
                <input type="text" name="contact" id="contact" value="{{ old('contact') }}">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div>
                <button type="submit">Adicionar Contato</button>
            </div>
        </form>

        <a href="{{ route('contacts.index') }}" class="btn btn-primary">Voltar</a>

    </div>
@endsection
