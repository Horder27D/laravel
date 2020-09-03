<?php

use Illuminate\Database\Seeder;
use App\Model\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(["name"=>"В обработке"]);  //Processed
        Status::create(["name"=>"Отклонено"]);    //Rejected
        Status::create(["name"=>"Утверждён"]);    //Approved
    }
}
