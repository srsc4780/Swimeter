<?php

namespace App\Http\Controllers;

use App\Http\Concerns\WorksWithModels;
use App\Http\Requests\AccountUpdateRequest;
use Hash;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    use WorksWithModels;

    public function showAccountInfoPage()
    {
        return view('public.account.info');
    }

    public function updateAccountInfo(AccountUpdateRequest $request)
    {
        $input = $this->getInputForSave($request);

        $this->visitor->update($input['user']);

        if ($address = $this->visitor->address) {
            $address->update($input['address']);
        } else {
            $this->visitor->address()->create($input['address']);
        }

        return $this->updated($this->visitor, 'Successfully updated your account information.');
    }

    protected function getInputForSave(Request $request)
    {
        $input = $request->only([
            'name', 'email', 'phone',
            'password', 'address_line_1', 'address_line_2',
            'postal_code', 'locality', 'administrative_area',
            'country',
        ]);

        if (empty($input['password'])) {
            unset ($input['password']);
        } else {
            $input['password'] = Hash::make($input['password']);
        }

        $input['phone'] = phone($input['phone'], $input['country'])->formatInternational();

        return [
            'user' => array_only($input, [
                'name', 'email', 'phone',
                'password',
            ]),
            'address' => array_only($input, [
                'address_line_1', 'address_line_2', 'postal_code',
                'locality', 'administrative_area', 'country',
            ]),
        ];
    }
}
