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
            'name' => 'writer1',
            'email' => 'writer1@writer1.ru',
            'password' => Hash::make('writer1writer1'),
            'roles_id' => '2',
        ]);
        User::create([
            'name' => 'writer2',
            'email' => 'writer2@writer2.ru',
            'password' => Hash::make('writer1writer2'),
            'roles_id' => '2',
        ]);
        User::create([
                    'name' => 'user',
                    'email' => 'user@user.ru',
                    'password' => Hash::make('useruser'),
                    'roles_id' => '1',
        ]);
        for($i=1; $i<=30; $i++)
        {
            User::create([
                'name' => 'user'.$i,
                'email' => 'user'.$i.'@user.ru',
                'password' => Hash::make('user'.$i.'user'.$i),
                'roles_id' => '1'
                ]);  
        }
    }
}
