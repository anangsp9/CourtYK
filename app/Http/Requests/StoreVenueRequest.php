<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVenueRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'name' => ['required', 'string', 'max:255'],

            'address' => ['required', 'string'],

            'description' => ['nullable', 'string'],

            'open_time' => ['required'],

            'close_time' => ['required'],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'featured_facilities' => [
                'nullable',
                'array',
            ],

            'featured_facilities.*' => [
                'string',
                Rule::in(array_keys(config('facilities'))),
            ],
        ];
    }
}