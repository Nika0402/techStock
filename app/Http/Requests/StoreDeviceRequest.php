<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeviceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'numero_serie' => 'required|string|unique:devices,numero_serie',
            'etat' => 'required|string',
            'date_achat' => 'required|date',
            'description' => 'nullable|string',
            'room_id' => 'required|exists:rooms,id',
            'categories' => 'nullable|array',
        ];
    }
}