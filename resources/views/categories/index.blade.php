@extends('layouts.app')

@section('title', 'Liste des catégories')

@section('content')

    <h1>Liste des catégories</h1>

    <a href="{{ route('categories.create') }}" class="btn">Ajouter une catégorie</a>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Nb équipements</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->nom }}</td>
                    <td>{{ $category->devices_count }}</td>
                    <td><a href="{{ route('categories.devices', $category) }}">Voir les équipements</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Aucune catégorie pour le moment.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection