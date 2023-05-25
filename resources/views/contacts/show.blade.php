@extends('layouts.app')

@section('menu')
    @include('includes.menu')
@endsection

@section('content')
    <div class="container">

<h1>Detalhes do Contato</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<p><strong>Nome:</strong> {{ $contact->name }}</p>
<p><strong>Contato:</strong> {{ $contact->contact }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>

<a href="{{ route('contacts.edit', $contact->id) }}">Editar</a>

<form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Excluir</button>
</form>

<a href="{{ route('contacts.index') }}" class="btn btn-primary">Voltar</a>

</div>

@endsection
