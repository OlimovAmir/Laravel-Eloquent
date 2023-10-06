<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id', // Проверка существования связанной записи в таблице positions
            'address_id' => 'required|exists:addresses,id', // Проверка существования связанной записи в таблице addresses
            'passport_data' => 'required|string',
            'photo_path' => 'nullable|string', // Ваша логика для проверки загруженной фотографии
        ];
    }
}
