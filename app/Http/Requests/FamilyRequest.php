<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class FamilyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->getMethod() === 'POST') {
            return [
                'first_name' => 'required|string|max:64',
                'middle_name' => 'nullable|string|max:64',
                'last_name' => 'required|string|max:64',
                'avatar' => 'sometimes|required|image|max:1024',
                'email' => 'nullable|email|max:128',
                'phone' => 'nullable|string|max:128',
                'address' => 'nullable|string|max:250',
                'dob' => 'nullable|date:Y-m-d',
                'father_id' => 'nullable|integer|gt:0',
                'mother_id' => 'nullable|integer|gt:0',
                'spouse' => 'nullable',
                'gender' => 'required|in:M,F',
            ];
        }

        return [
            'first_name' => 'required|string|max:64',
            'middle_name' => 'nullable|string|max:64',
            'last_name' => 'required|string|max:64',
            'avatar' => 'sometimes|required|image|max:1024',
            'email' => 'nullable|email|max:128',
            'phone' => 'nullable|string|max:128',
            'address' => 'nullable|string|max:250',
            'dob' => 'nullable|date:Y-m-d',
            'father_id' => 'nullable|integer|gt:0',
            'mother_id' => 'nullable|integer|gt:0',
            'spouse' => 'nullable',
            'gender' => 'required|in:M,F',
        ];
    }
}
