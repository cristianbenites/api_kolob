<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostUpdatePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:3'],
            'district' => ['required', 'min:3'],
            'street' => ['required', 'min:3'],
            'number' => ['required'],
            'complement' => ['nullable'],
            'city' => ['required', 'min:3'],
            'uf' => [
                'required',
                Rule::in(['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB',
                        'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO', 'DF'])
            ],
            'bedrooms' => ['nullable', 'integer'],
            'suites' => ['nullable', 'integer'],
            'living_rooms' => ['nullable', 'integer'],
            'kitchens' => ['nullable', 'integer'],
            'parking_spaces' => ['nullable', 'integer'],
            'room_kitchen_combined' => ['boolean'],
            'building_area' => ['nullable', 'regex:/\d+\.?\d*/'],
            'total_area' => ['nullable', 'regex:/\d+\.?\d*/'],
            'property_type' => [
                'required',
                Rule::in(['aluguel', 'venda', 'compra'])
            ],
            'property_full_price' => ['nullable', 'regex:/\d+\.?\d*/'],
            'property_rental_price' => ['nullable', 'regex:/\d+\.?\d*/'],
        ];
    }
}
