<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'min:5',
            'contact' => [
                'digits:9',
                Rule::unique('contacts', 'contact')->ignore($this->route('contact')),
            ],
            'email' => [
                Rule::unique('contacts', 'email')->ignore($this->route('contact')),
            ],
        ];
    }
}
