<?php

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
        DB::table('users')->insert([

            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'address' => 'Nepal',
            'phone' => '1111111111',
            'user_type' => '0',
            'status' => '1',
            'approve'=>'1',
            ]);
    }
}
