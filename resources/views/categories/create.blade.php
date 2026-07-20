@extends('layouts.app')

@section('title', 'Ajouter une catégorie')

@section('content')

    <h1>Ajouter une catégorie</h1>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <label>Nom :</label>
        <input type="text" name="nom" value="{{ old('nom') }}">

        <button type="submit" class="btn">Enregistrer</button>
    </form>

@endsection