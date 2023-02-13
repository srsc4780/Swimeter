<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user() instanceof User;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /** @var User $user */
        $user = $this->user();

        return [
            'name' => 'required|string|max:200',
            'email' => 'required|email|max:200|' . Rule::unique('users', 'email')->ignoreModel($user, 'id'),
            'phone' => 'required|phone:country|' . Rule::unique('users', 'phone')->ignoreModel($user, 'id'),
            'password' => 'nullable|string|confirmed',

            'address_line_1' => 'required|string',
            'address_line_2' => 'nullable|string',
            'postal_code' => 'required|string',
            'locality' => 'required|string',
            'administrative_area' => 'required|string',
            'country' => 'required|string',
        ];
    }
}
