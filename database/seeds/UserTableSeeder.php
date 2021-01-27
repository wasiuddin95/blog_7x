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
        App\User::create([
            'name' => 'Wasi Uddin',
            'email' => 'wuddin73@gmail.com',
            'password' => bcrypt('qwertyui'),
        ]);
    }
}
