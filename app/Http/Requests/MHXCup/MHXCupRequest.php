<?php

namespace App\Http\Requests\MHXCup;

use Illuminate\Foundation\Http\FormRequest;

class MHXCupRequest extends FormRequest
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
            'category'                  => 'required|string',
            'price_category'            => 'required|numeric',
            'total_cost'                => 'required|numeric',
            'full_name'                 => 'required|string',
            'identification_card_number' => 'required|string',
            'phone_number'              => 'required|string',
            'email'                     => 'required|string|email',
            'nickname'                  => 'required|string',
            'registration'              => 'required|numeric'
        ];
    }
}
