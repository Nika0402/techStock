@extends('layouts.app')

@section('title', $room->nom)

@section('content')

    <h1>{{ $room->nom }}</h1>

    <p><strong>Bâtiment :</strong> {{ $room->batiment }}</p>
    <p><strong>Capacité :</strong> {{ $room->capacite }}</p>

    <h2>Équipements dans cette salle</h2>

    <ul>
        @forelse ($room->devices as $device)
            <li>
                <a href="{{ route('devices.show', $device) }}">{{ $device->nom }}</a>
                ({{ $device->marque }} — {{ $device->etat }})
            </li>
        @empty
            <li>Aucun équipement dans cette salle.</li>
        @endforelse
    </ul>

@endsection