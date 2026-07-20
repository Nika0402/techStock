@extends('layouts.app')

@section('title', 'Modifier un équipement')

@section('content')

    <h1>Modifier un équipement</h1>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('devices.update', $device) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nom :</label>
        <input type="text" name="nom" value="{{ old('nom', $device->nom) }}">

        <label>Marque :</label>
        <input type="text" name="marque" value="{{ old('marque', $device->marque) }}">

        <label>Numéro de série :</label>
        <input type="text" name="numero_serie" value="{{ old('numero_serie', $device->numero_serie) }}">

        <label>État :</label>
        <select name="etat">
            <option value="neuf" {{ old('etat', $device->etat) == 'neuf' ? 'selected' : '' }}>Neuf</option>
            <option value="bon" {{ old('etat', $device->etat) == 'bon' ? 'selected' : '' }}>Bon</option>
            <option value="en panne" {{ old('etat', $device->etat) == 'en panne' ? 'selected' : '' }}>En panne</option>
        </select>

        <label>Date d'achat :</label>
        <input type="date" name="date_achat" value="{{ old('date_achat', $device->date_achat) }}">

        <label>Description :</label>
        <textarea name="description">{{ old('description', $device->description) }}</textarea>

        <label>Salle :</label>
        <select name="room_id">
            @foreach ($rooms as $room)
                <option value="{{ $room->id }}" {{ old('room_id', $device->room_id) == $room->id ? 'selected' : '' }}>
                    {{ $room->nom }}
                </option>
            @endforeach
        </select>

        <label>Catégories :</label>
        @foreach ($categories as $category)
            <label style="font-weight: normal; display: inline-block; margin-right: 15px;">
                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                    {{ in_array($category->id, old('categories', $device->categories->pluck('id')->toArray())) ? 'checked' : '' }}
                    style="width: auto;">
                {{ $category->nom }}
            </label>
        @endforeach

        <button type="submit" class="btn">Enregistrer les modifications</button>
    </form>

@endsection