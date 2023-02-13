<?php

use App\User;
use Illuminate\Database\Seeder;

class MetersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::findOrFail(2)->meters()->create([
            'status' => 'active',
            'uuid' => '5076eb63-ec36-4354-a663-5a7f3dcf7986'
        ]);
    }
}
