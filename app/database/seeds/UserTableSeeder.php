<?php

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();

    User::create(array(
        'name'     => 'Eko Pebrisulistiyo',
        'username' => 'admin',
        'email'    => 'eko@mail.com',
        'level'    => 'admin',
        'password' => Hash::make('admin'),
    ));
}

}