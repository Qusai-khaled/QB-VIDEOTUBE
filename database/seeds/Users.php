<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Qusai Khaled',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
            'group' => 'admin'
        ]);
    }
}
