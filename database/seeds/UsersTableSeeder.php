<?php

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
        DB::table('users')->insert([
            'username' => 'UserName',
            'mail' => 'User@mailaddress.com',
            'password' => bcrypt('password'),
        ]);
        //
    }
}
