<?php

use Illuminate\Database\Seeder;
use App\Model\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create(["name"=>"Пользователь"]);    //User
        Roles::create(["name"=>"Автор"]);           //Writer
        Roles::create(["name"=>"Модератор"]);       //Moderator
        Roles::create(["name"=>"Администратор"]);   //Administrator
    }
}
