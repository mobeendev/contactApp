<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'Abdul Mobeen',
        'email'    => 'mobeendev@gmail.com',
        'password' => Hash::make('abc123'),
    ));
}

}