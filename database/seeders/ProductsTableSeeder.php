<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     for($i = 1; $i < 22; $i++){
          Product::create([
          	'name' => 'cloth' . $i,
          	'slug' => 'cloth-' . $i,
          	'details' => 'Overlaodedsize 12 Ankara style',
          	'price' => 2000 * $i,
          	'description' =>  'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
     			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
     			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
     			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
     			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
     			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
          ])->varieties()->attach(5);
     }
     for($i = 1; $i < 2; $i++){
          Product::create([
          	'name' => 'gown ' . $i,
          	'slug' => 'gown-' . $i,
          	'details' => 'size 12 Ankara style',
          	'price' => 4000 * $i,
          	'description' =>  'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
     			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
     			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
     			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
     			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
     			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
               'featured' => 1,
          ])->varieties()->attach(1);
     }
     for($i = 1; $i < 3; $i++){
          Product::create([
          	'name' => 'watch ' . $i,
          	'slug' => 'watch-' . $i,
          	'details' => 'size 12 Ankara style',
          	'price' => 12000 * $i,
          	'description' =>  'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
     			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
     			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
     			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
     			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
     			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                    'featured' => 1,
          ])->varieties()->attach(2);
     }
     for($i = 1; $i < 25; $i++){
          Product::create([
          	'name' => 'bag ' . $i,
          	'slug' => 'bag-' . $i,
          	'details' => 'size 12 Ankara style',
          	'price' => 6540 * $i,
          	'description' =>  'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                    'featured' => 1
               ])->varieties()->attach(3);
     }
     for($i = 1; $i < 4; $i++){

          Product::create([
          	'name' => 'necklace ' . $i,
          	'slug' => 'necklace-' . $i,
          	'details' => 'size 12 Ankara style',
          	'price' => 4400 * $i,
          	'description' =>  'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
     			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
     			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
     			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
     			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
     			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                    'featured' => 1,
          ])->varieties()->attach(4);
     }   
    }
}
