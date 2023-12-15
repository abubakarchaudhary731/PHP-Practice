<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;


class TestRequest extends FormRequest
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
        $userId = $this->route('id');
        return [
            'name' => 'required',
            'email' => 'required', 'email', Rule::unique('tests')->ignore($userId),
            'state' => 'required',
            'phone_no' => 'required | numeric',
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'state' => 'State',
            'phone_no' => 'Phone Number',
        ];
    }
    protected function prepareForValidation(): Void
    {
        // Save the Email in lowercase
        $this->merge([
            'email' => strtolower($this->email),
            // add - to name
            'name' => Str::slug($this->name),

        ]);
    }

    protected $stopOnFirstFailure = true;
}
