@extends('layouts.app')

@section('title', 'Liste des équipements')

@section('content')

    <h1>Liste des équipements</h1>

    <form method="GET" action="{{ route('devices.index') }}" style="margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Rechercher par nom ou marque..." value="{{ request('search') }}" style="width: 300px; display: inline-block;">
        <button type="submit" class="btn">Rechercher</button>
        @if (request('search'))
            <a href="{{ route('devices.index') }}" class="btn">Réinitialiser</a>
        @endif
    </form>

    <a href="{{ route('devices.create') }}" class="btn">Ajouter un équipement</a>

    <table>
        <thead>
            <tr>
                <th><a href="{{ route('devices.index', ['sort' => 'nom', 'search' => request('search')]) }}">Nom</a></th>
                <th><a href="{{ route('devices.index', ['sort' => 'marque', 'search' => request('search')]) }}">Marque</a></th>
                <th>N° série</th>
                <th><a href="{{ route('devices.index', ['sort' => 'etat', 'search' => request('search')]) }}">État</a></th>
                <th>Salle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($devices as $device)
                <tr>
                    <td>{{ $device->nom }}</td>
                    <td>{{ $device->marque }}</td>
                    <td>{{ $device->numero_serie }}</td>
                    <td><span class="badge badge-{{ str_replace(' ', '-', $device->etat) }}">{{ $device->etat }}</span></td>
                    <td>{{ $device->room->nom }}</td>
                    <td>
                        <a href="{{ route('devices.show', $device) }}">Voir</a>
                        <a href="{{ route('devices.edit', $device) }}">Modifier</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Aucun équipement pour le moment.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection