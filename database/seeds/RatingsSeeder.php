<?php

use Illuminate\Database\Seeder;
use App\Model\Ratings;

class RatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=30; $i++)
        {
            Ratings::create([
                "articles_id"=>$i,
                "user_id"=>'2',
                "total"=> rand(0,10)
            ]);
            Ratings::create([
                "articles_id"=>$i,
                "user_id"=>'3',
                "total"=> rand(0,10)
            ]);
        }
    }
}
