<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'sheikh shakib',
            'email'=>'sheikhshakib@gmail.com',
            'password'=>bcrypt('sakib123'),
        ]);
    }
}
