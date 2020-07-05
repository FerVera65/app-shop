<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Fernando',
            'email'=>'fer_vera@hotmail.com',
            'password'=> bcrypt('fernando'),
            'admin'=> true
        ]);

        User::create([
            'name'=>'Monica',
            'email'=>'mony_maga@hotmail.com',
            'password'=> bcrypt('fernando'),
            'admin'=> false
        ]);
    }
}
