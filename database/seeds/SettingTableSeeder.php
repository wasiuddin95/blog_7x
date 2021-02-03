<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'name' => 'NewsPortal.com',
            'copyright' => 'Copyright © 2021 All rights reserved',
        ]);
    }
}
