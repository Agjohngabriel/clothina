<?php

namespace Database\Seeders;
use App\Models\Variety;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VarietiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
        Variety::insert([
        	['name' => 'Gowns', 'slug' => 'gowns', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'Watchs', 'slug' => 'watchs', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'bags', 'slug' => 'bags', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'Necklaces', 'slug' => 'necklaces', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'Cloths', 'slug' => 'cloths', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
