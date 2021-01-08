<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coupon;
class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
        	'code' => 'AB123',
        	'type' => 'fixed',
        	'value' => 30,
        ]);
        Coupon::create([
        	'code' => 'QWERTY',
        	'type' => 'percent',
        	'percent_off' => 50,
        ]);
    }
}
