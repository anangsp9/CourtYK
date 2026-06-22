<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'booking_date' => ['required', 'date'],
            'start_time' => ['required'],
            'duration' => ['required', 'integer', 'min:1', 'max:4'],
        ];
    }
}