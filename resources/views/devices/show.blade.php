@extends('layouts.app')

@section('title', $device->nom)

@section('content')

    <h1>{{ $device->nom }}</h1>

    <p><strong>Marque :</strong> {{ $device->marque }}</p>
    <p><strong>N° série :</strong> {{ $device->numero_serie }}</p>
    <p><strong>État :</strong> <span class="badge badge-{{ str_replace(' ', '-', $device->etat) }}">{{ $device->etat }}</span></p>
    <p><strong>Date d'achat :</strong> {{ $device->date_achat }}</p>
    <p><strong>Description :</strong> {{ $device->description }}</p>
    <p><strong>Salle :</strong> {{ $device->room->nom }}</p>

    <p><strong>Catégories :</strong>
        @forelse ($device->categories as $category)
            {{ $category->nom }}{{ !$loop->last ? ', ' : '' }}
        @empty
            Aucune catégorie
        @endforelse
    </p>

    <a href="{{ route('devices.edit', $device) }}" class="btn">Modifier</a>

    <form action="{{ route('devices.destroy', $device) }}" method="POST" onsubmit="return confirm('Supprimer cet équipement ?');" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn" style="background-color: #dc2626;">Supprimer</button>
    </form>

    <hr>

    <h2>Historique des interventions</h2>

    <ul>
        @forelse ($device->interventions as $intervention)
            <li>{{ $intervention->date }} — {{ $intervention->type }} : {{ $intervention->commentaire }}</li>
        @empty
            <li>Aucune intervention enregistrée.</li>
        @endforelse
    </ul>

    <h3>Ajouter une intervention</h3>
    <form action="{{ route('interventions.store') }}" method="POST">
        @csrf
        <input type="hidden" name="device_id" value="{{ $device->id }}">

        <label>Date :</label>
        <input type="date" name="date">

        <label>Type :</label>
        <input type="text" name="type">

        <label>Commentaire :</label>
        <textarea name="commentaire"></textarea>

        <button type="submit" class="btn">Ajouter l'intervention</button>
    </form>

@endsection