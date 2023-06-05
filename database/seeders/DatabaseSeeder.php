<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        
        $addresses = \App\Models\Address::factory()->create([
            'city_name' => 'Jenin',
            'village_name' => 'obaid',
        ]);

        \App\Models\User::factory()->create([
            'fname' => 'haya',
            'lname' => 'obaid',
            'number' => 12345,
            'image' =>'',
            'description'=> '',
            'num_evl'=> 0,
            'all_evl'=> 0,
            'gender'=> 0,
            'is_worker'=> 0,
            'is_active'=> 0,
            'address_id'=> $addresses->id, 
            'password' => Hash::make('12345')
        ]);
    }
}
