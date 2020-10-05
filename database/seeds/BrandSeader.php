<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 4; ++$i) {
            App\brand::create(['name'=>'brand' . $i]);
        }
        
    }
}
