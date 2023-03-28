<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => ['required', 'date'],
            'birth_place' => 'required',
            'has_newsletter' => 'nullable',
            'introduction' => 'required',
            'title' => 'required',
            'blood_type' => 'required',
            'interests' => ['nullable', 'array'],
        ];
    }
}
