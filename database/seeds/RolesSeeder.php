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
        Roles::create(["name"=>"User"]);
        Roles::create(["name"=>"Writer"]);
        Roles::create(["name"=>"Moderator"]);
        Roles::create(["name"=>"Administrator"]);
    }
}
