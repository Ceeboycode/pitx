<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'f_name' => strtolower(trim($this->f_name)),
            'm_name' => $this->m_name ? strtolower(trim($this->m_name)) : null,
            'l_name' => strtolower(trim($this->l_name)),
            'suffix' => $this->suffix ? strtolower(trim($this->suffix)) : null,
            'email'  => strtolower(trim($this->email)),
        ]);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'f_name' => ['required', 'string', 'max:50'],
            'm_name' => ['nullable', 'string', 'max:50'],
            'l_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:11', 'unique:users,phone'],
            'role_id' => [
                        'required',
                        Rule::exists('roles', 'id')->where('is_active', true),
                    ],
        ];
    }
}
