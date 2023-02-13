<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents(
            storage_path('seeds/users.json')
        ), true);

        foreach ($data as $datum) {
            $datum['password'] = Hash::make($datum['password']);
            $datum['phone'] = phone($datum['phone'], 'BD')->formatInternational();

            User::create($datum);
        }
    }
}
