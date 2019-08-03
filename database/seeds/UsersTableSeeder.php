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
        $user = App\User::create([
           
            'name' =>'kati frantz',
            'email' =>'kati@anas.me',
            'password' =>bcrypt('password'),
            'admin'   => 1
        ]);

        App\Profile::create([
           
            'user_id' => $user->id,

            'avatar' =>'uploads/avatars/1.jpg',

            'about' =>'im ComputerSoftware developer From Canda',

            'facebook'   => 'facebook',

            'youtube'   => 'youtube.com'
        ]);
    }
}
