@extends('layouts.app')

@section('title', 'Équipements - ' . $category->nom)

@section('content')

    <h1>Équipements de la catégorie : {{ $category->nom }}</h1>

    <ul>
        @forelse ($category->devices as $device)
            <li>
                <a href="{{ route('devices.show', $device) }}">{{ $device->nom }}</a>
                ({{ $device->marque }} — {{ $device->etat }})
            </li>
        @empty
            <li>Aucun équipement dans cette catégorie.</li>
        @endforelse
    </ul>

@endsection