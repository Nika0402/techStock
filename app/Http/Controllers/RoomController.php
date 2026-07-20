<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::withCount('devices')->get();

        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(StoreRoomRequest $request)
    {
        Room::create($request->validated());

        return redirect()->route('rooms.index')->with('success', 'Salle ajoutée avec succès.');
    }

    public function show(Room $room)
    {
        $room->load('devices');

        return view('rooms.show', compact('room'));
    }
}