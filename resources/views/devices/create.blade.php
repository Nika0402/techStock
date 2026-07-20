@extends('layouts.app')

@section('title', 'Ajouter un équipement')

@section('content')

    <h1>Ajouter un équipement</h1>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('devices.store') }}" method="POST">
        @csrf

        <label>Nom :</label>
        <input type="text" name="nom" value="{{ old('nom') }}">

        <label>Marque :</label>
        <input type="text" name="marque" value="{{ old('marque') }}">

        <label>Numéro de série :</label>
        <input type="text" name="numero_serie" value="{{ old('numero_serie') }}">

        <label>État :</label>
        <select name="etat">
            <option value="neuf" {{ old('etat') == 'neuf' ? 'selected' : '' }}>Neuf</option>
            <option value="bon" {{ old('etat') == 'bon' ? 'selected' : '' }}>Bon</option>
            <option value="en panne" {{ old('etat') == 'en panne' ? 'selected' : '' }}>En panne</option>
        </select>

        <label>Date d'achat :</label>
        <input type="date" name="date_achat" value="{{ old('date_achat') }}">

        <label>Description :</label>
        <textarea name="description">{{ old('description') }}</textarea>

        <label>Salle :</label>
        <select name="room_id">
            @foreach ($rooms as $room)
                <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                    {{ $room->nom }}
                </option>
            @endforeach
        </select>

        <label>Catégories :</label>
        @foreach ($categories as $category)
            <label style="font-weight: normal; display: inline-block; margin-right: 15px;">
                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                    {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}
                    style="width: auto;">
                {{ $category->nom }}
            </label>
        @endforeach

        <button type="submit" class="btn">Enregistrer</button>
    </form>

@endsection