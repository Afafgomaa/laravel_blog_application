<?php

use Illuminate\Database\Seeder;
use App\Setting;
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
        	'address' => 'mohndseen',
        	'site_name' => 'Application',
        	'contact_number' => '01014381577'
        ]);
    }
}
