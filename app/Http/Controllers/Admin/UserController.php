<?php

namespace App\Http\Controllers\Admin;

use App\Http\Concerns\WorksWithModels;
use App\Http\Requests\Admin\UserSaveRequest;
use App\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use WorksWithModels;

    public function index()
    {
        $users = User::whereIsAdmin(false)
                     ->paginate();

        return view('admin.user.list')->with(compact([
            'users',
        ]));
    }

    public function add()
    {
        return $this->edit(new User);
    }

    public function create(UserSaveRequest $request)
    {
        $input = $this->getInputForSave($request);

        $user = User::create($input['user']);

        $user->status()->create([
            'type' => $input['status']['customer_type'],
            'balance' => 0,
        ]);

        $user->address()->create($input['address']);

        return $this->created($user);
    }

    public function view(User $user)
    {
        return view('admin.user.view')->with(compact([
            'user',
        ]));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit')->with(compact([
            'user',
        ]));
    }

    public function update(UserSaveRequest $request, User $user)
    {
        $input = $this->getInputForSave($request);

        $user->update($input['user']);

        if ($user->address) {
            $user->address->update($input['address']);
        } else {
            $user->address()->create($input['address']);
        }

        return $this->updated($user);
    }

    protected function getInputForSave(Request $request)
    {
        $input = $request->only([
            'name', 'email', 'phone',
            'password', 'address_line_1', 'address_line_2',
            'postal_code', 'locality', 'administrative_area',
            'country', 'customer_type',
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
            'status' => array_only($input, [
                'customer_type',
            ]),
        ];
    }
}
