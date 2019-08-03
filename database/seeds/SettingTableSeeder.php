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
        \App\Setting::create([
            
            'site_name'       =>  "Laravel's BLog" ,
            'address'         =>  "Cairo Egypt" ,
            'contact_number'  =>  "01028483303" ,
            'contact_email'   =>  "anas.mdhat@outlook.com"
            
            ]);

    }
}
