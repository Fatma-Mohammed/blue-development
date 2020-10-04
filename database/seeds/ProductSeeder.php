<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 4; ++$i) {
            App\Product::create(['name'=>'prod' . $i, 'price' => 10 *$i, 'SKE'=>'1214547752121D2', 'stock_quantity'=>random_int(10, 40)]);
        }
        
    }
}
