<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use App\Http\Requests\StoreInterventionRequest;

class InterventionController extends Controller
{
    public function store(StoreInterventionRequest $request)
{
    $validated = $request->validated();

    Intervention::create($validated);

    return redirect()->route('devices.show', $validated['device_id'])->with('success', 'Intervention ajoutée avec succès.');
}
}