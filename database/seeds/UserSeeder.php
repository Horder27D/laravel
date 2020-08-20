<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                    'name' => 'admin',
                    'email' => 'admin@admin.ru',
                    'password' => Hash::make('adminadmin'),
                    'avatar' => 'img/Anonymous.svg',
                    'roles_id' => '4',
                ]);
        User::create([
                    'name' => 'moder',
                    'email' => 'moder@moder.ru',
                    'password' => Hash::make('modermoder'),
                    'avatar' => 'img/sombody.jpg',
                    'roles_id' => '3',
        ]);
        User::create([
                    'name' => 'writer',
                    'email' => 'writer@writer.ru',
                    'password' => Hash::make('writerwriter'),
                    'roles_id' => '2',
        ]);
        User::create([
                    'name' => 'user',
                    'email' => 'user@user.ru',
                    'password' => Hash::make('useruser'),
                    'roles_id' => '1',
        ]);
    }
}
