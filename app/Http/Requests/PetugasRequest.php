<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetugasRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nama_petugas' => 'required|string|max:100|min:3',
            'username' => 'required|string|max:50|regex:/^\S*$/u',
            'password' => 'required|string|min:6',
            'id_level' => 'required|integer|exists:level,id_level',
        ];
    }

    public function messages()
    {
        return [
            'username.regex' => 'Username tidak boleh mengandung spasi.',
        ];
    }
}
