<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInterventionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'type' => 'required|string|max:255',
            'commentaire' => 'nullable|string',
            'device_id' => 'required|exists:devices,id',
        ];
    }
}