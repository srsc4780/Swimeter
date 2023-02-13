<?php

namespace App\Http\Requests\Admin;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserSaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user() instanceof User && $this->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->route('user');

        $rules = [
            'name' => 'required|string|max:200',
            'customer_type' => 'required|string',

            'address_line_1' => 'required|string',
            'address_line_2' => 'nullable|string',
            'postal_code' => 'required|string',
            'locality' => 'required|string',
            'administrative_area' => 'required|string',
            'country' => 'required|string',
        ];

        if ($user instanceof User) {
            $rules += [
                'email' => 'required|email|max:200|' . Rule::unique('users', 'email')->ignoreModel($user, 'id'),
                'phone' => 'required|phone:country|' . Rule::unique('users', 'phone')->ignoreModel($user, 'id'),
                'password' => 'nullable|string|confirmed',
            ];
        } else {
            $rules += [
                'email' => 'required|email|max:200|' . Rule::unique('users', 'email'),
                'phone' => 'required|phone:country|' . Rule::unique('users', 'phone'),
                'password' => 'required|string|confirmed',
            ];
        }

        return $rules;
    }
}
