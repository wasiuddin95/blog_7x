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
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptate odit corrupti vitae cupiditate
            explicabo, soluta quibusdam necessitatibus, provident reprehenderit, dolorem saepe non eligendi
            possimus autem repellendus nesciunt, est deleniti libero recusandae officiis. Voluptatibus quisquam
            voluptatum expedita recusandae architecto quibusdam.'
        ]);
    }
}
