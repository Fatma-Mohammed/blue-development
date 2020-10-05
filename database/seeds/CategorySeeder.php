<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 4; ++$i) {
            App\category::create(['name'=>'category' . $i]);
        }
        
    }
}
