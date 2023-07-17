<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Advertisement;
use App\Models\Craft;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $users =\App\Models\User::factory(50)->create();

        // foreach($users as $user){
        //    $crafts = Craft::all();
        //    $user->crafts()->attach($crafts->random(rand(1,3))->pluck('id')->toArray());
       
        // }
        // Advertisement::factory()->count(50)->create();

        // \App\Models\User::factory(10)->create();
        
        $addresses = \App\Models\Address::factory()->create([
            'city_name' => 'Jenin',
            'village_name' => 'Yabad',
        ]);

        // \App\Models\User::factory()->create([
        //     'fname' => 'haya',
        //     'lname' => 'obaid',
        //     'number' => 12345,
        //     'image' =>'',
        //     'description'=> '',
        //     'num_evl'=> 0,
        //     'all_evl'=> 0,
        //     'gender'=> 0,
        //     'is_worker'=> 0,

        //     'address_id'=> $addresses->id, 
        //     'password' => Hash::make('12345')
        // ]);

        // \App\Models\User::factory()->create([
        //     'fname' => 'rahaf',
        //     'lname' => 'abushamleh',
        //     'number' => 9876,
        //     'image' =>'',
        //     'description'=> '',
        //     'num_evl'=> 0,
        //     'all_evl'=> 0,
        //     'gender'=> 0,
        //     'is_worker'=> 1,
        //     'is_active'=> 0,
        //     'address_id'=> $addresses->id, 
        //     'password' => Hash::make('9876')
        // ]);

        \App\Models\User::factory()->create([
            'fname' => 'malaak',
            'lname' => 'melhem',
            'number' => 1209,
            'image' =>'',
            'description'=> '',
            'num_evl'=> 0,
            'all_evl'=> 0,
            'gender'=> 0,
            'is_worker'=> 1,
            'is_active'=> 0,
            'address_id'=> $addresses->id, 
            'password' => Hash::make('1209')
        ]);
    }
}
