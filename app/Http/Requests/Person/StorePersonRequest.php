<?php

namespace App\Http\Requests\Person;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


/**
 * Class StoreuserRequest
 * @package App\Http\Requests\user
 */
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
            'cpf' => [
                'required',
                'regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
                Rule::unique('persons'),
            ],
            'name' => [
                'required',
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('persons'),
            ],
            'phone' => [
                'required',
                Rule::unique('persons'),
            ],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'cpf.required'   => __('The document is required.'),
            'cpf.unique'     => __('There is already a user with this document.'),
            'name.required'       => __('The name is required.'),
            'email.required'      => __('The email is required.'),
            'email.unique'        => __('There is already a user with this e-mail.'),
            'phone.required'  => __('The phone is required.'),
            'phone.unique'  => __('The phone has already been taken.'),
        ];
    }
}
