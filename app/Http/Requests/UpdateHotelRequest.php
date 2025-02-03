<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'province_name' => 'required|string',
            'category' => 'required|string',
            'district_id' => 'required|integer',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'rating' => 'nullable|numeric',
            'price_per_night' => 'nullable|numeric',
            'amenities' => 'nullable',
            'room_types' => 'nullable',
            'check_in_time' => 'nullable|string',
            'check_out_time' => 'nullable|string',
            'contact_number' => 'nullable|string',
            'email' => 'nullable|email|unique:hotels',
            'website' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
