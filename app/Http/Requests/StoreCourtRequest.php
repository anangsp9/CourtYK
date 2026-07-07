<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCourtRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'venue_id' => [
                'required',
                'exists:venues,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'floor_type' => [
                'required',
                Rule::in(array_keys(config('courts.floor_types'))),
            ],

            'court_type' => [
                'required',
                Rule::in(array_keys(config('courts.court_types'))),
            ],

            'price_per_hour' => [
                'required',
                'integer',
                'min:0',
            ],

        ];
    }
}
