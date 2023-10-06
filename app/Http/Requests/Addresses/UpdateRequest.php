<?php

namespace App\Http\Requests\Addresses;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'country' => 'required|string|max:255', // Страна - обязательное поле, строка, максимум 255 символов
            'city' => 'required|string|max:255', // Город - обязательное поле, строка, максимум 255 символов
            'street' => 'required|string|max:255', // Улица - обязательное поле, строка, максимум 255 символов
            'house_number' => 'required|integer', // Дом - обязательное поле, целое число
            'apartment_number' => 'required|integer', // Квартира - обязательное поле, целое число
        ];
    }
}
