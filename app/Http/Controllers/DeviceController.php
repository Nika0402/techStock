<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Room;
use App\Models\Category;
use App\Http\Requests\StoreDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index(Request $request)
{
    $sort = $request->get('sort', 'nom');
    $allowedSorts = ['nom', 'marque', 'etat'];

    if (!in_array($sort, $allowedSorts)) {
        $sort = 'nom';
    }

    $devices = Device::with('room')
        ->when($request->search, function ($query, $search) {
            $query->where('nom', 'like', '%' . $search . '%')
                  ->orWhere('marque', 'like', '%' . $search . '%');
        })
        ->orderBy($sort)
        ->get();

    return view('devices.index', compact('devices'));
}

    public function create()
    {
        $rooms = Room::all();
        $categories = Category::all();

        return view('devices.create', compact('rooms', 'categories'));
    }

    public function store(StoreDeviceRequest $request)
    {
        $device = Device::create($request->validated());
        $device->categories()->sync($request->categories ?? []);

        return redirect()->route('devices.index')->with('success', 'Équipement ajouté avec succès.');
    }

    public function show(Device $device)
    {
        $device->load('room', 'categories', 'interventions');

        return view('devices.show', compact('device'));
    }

    public function edit(Device $device)
    {
        $rooms = Room::all();
        $categories = Category::all();
        $device->load('categories');

        return view('devices.edit', compact('device', 'rooms', 'categories'));
    }

    public function update(UpdateDeviceRequest $request, Device $device)
    {
        $device->update($request->validated());
        $device->categories()->sync($request->categories ?? []);

        return redirect()->route('devices.show', $device)->with('success', 'Équipement modifié avec succès.');
    }

    public function destroy(Device $device)
    {
        $device->delete();

        return redirect()->route('devices.index')->with('success', 'Équipement supprimé avec succès.');
    }
}