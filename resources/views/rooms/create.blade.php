@extends('layouts.app')

@section('title', 'Ajouter une salle')

@section('content')

    <h1>Ajouter une salle</h1>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf

        <label>Nom :</label>
        <input type="text" name="nom" value="{{ old('nom') }}">

        <label>Bâtiment :</label>
        <input type="text" name="batiment" value="{{ old('batiment') }}">

        <label>Capacité :</label>
        <input type="number" name="capacite" value="{{ old('capacite') }}">

        <button type="submit" class="btn">Enregistrer</button>
    </form>

@endsection