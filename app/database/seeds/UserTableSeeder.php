<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
        	'email' => 'mediabeastnz@gmail.com',
            'password' => Hash::make('admin'),
            'username' => 'mediabeastnz',
            'is_admin' => '1'
        ));

		User::create(array(
        	'email' => 'example@email.com',
            'password' => Hash::make('user'),
            'username' => 'example',
            'is_admin' => '0'
        ));
    }
}