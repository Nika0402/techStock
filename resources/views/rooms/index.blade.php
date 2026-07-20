@extends('layouts.app')

@section('title', 'Liste des salles')

@section('content')

    <h1>Liste des salles</h1>

    <a href="{{ route('rooms.create') }}" class="btn">Ajouter une salle</a>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Bâtiment</th>
                <th>Capacité</th>
                <th>Nb équipements</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rooms as $room)
                <tr>
                    <td>{{ $room->nom }}</td>
                    <td>{{ $room->batiment }}</td>
                    <td>{{ $room->capacite }}</td>
                    <td>{{ $room->devices_count }}</td>
                    <td><a href="{{ route('rooms.show', $room) }}">Voir</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Aucune salle pour le moment.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection