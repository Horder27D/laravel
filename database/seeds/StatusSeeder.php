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
        Status::create(["name"=>"Processed"]);   //в обработке
        Status::create(["name"=>"Rejected"]);    //отклонён
        Status::create(["name"=>"Approved"]);    //утверждён
    }
}
