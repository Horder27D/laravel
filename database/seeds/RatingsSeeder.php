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
            for($j=6; $j<=36; $j++)
                if (rand(0,1))
                    Ratings::create([
                        "articles_id"=>$i,
                        "user_id"=>$j,
                        "total"=> rand(0,10)
                    ]);
    }
}
