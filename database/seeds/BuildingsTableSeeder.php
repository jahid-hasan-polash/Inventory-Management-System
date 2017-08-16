<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class {{class}} extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        
        $buildings = [
        ["name"=>"A building","size"=>500],
        ["name"=>"D building","size"=>500]
        ];

        foreach $item in $buildings{
        	Building::create($item);
        }
    }
}
