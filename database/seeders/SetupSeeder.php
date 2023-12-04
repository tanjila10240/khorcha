<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SetupSeeder extends Seeder{
    /**
     * Run the database seeds.
     */
    public function run() :void{
     DB::table('users')->insert([
     'name' => 'Tanjila Akter',
     'phone' => '01654655440',
     'email' => 'tanjila.akter@gmail.com',
     'password' => Hash::make('12345678'),
     'username' => 'tanjila',
     'role' => 1,
     'slug' => 'U'.uniqid(20),
     'created_at' => Carbon::now()->toDateTimeString(),
     ]);

     // basic table data seed
      DB::table('basics')->insert([
     'basic_company' => 'Ixpress Limited',
     'basic_title' => 'Curiar Service',
     'basic_creator' => 1,
     'basic_slug' => 'B'.uniqid(20),
     'created_at' => Carbon::now()->toDateTimeString(),
     ]);

       // social_media table data seed
      DB::table('social_media')->insert([
     'sm_facebook' => 'www.facebook.com',
     'sm_twitter' => '#',
     'sm_twitter' => '#',
     'sm_creator' => 1,
     'sm_slug' => 'SM'.uniqid(20),
     'created_at' => Carbon::now()->toDateTimeString(),
     ]); 

      // contact_information table data seed
       DB::table('contact_information')->insert([
     'ci_phone1' => '01645875245',
     'ci_email1' => 'tanjila@gmail.com',
     'ci_address1' => 'Mohakhali,Dhaka',
     'ci_creator' => 1,
     'ci_slug' => 'CI'.uniqid(20),
     'created_at' => Carbon::now()->toDateTimeString(),
     ]);

      // role table data seed  
       $roles=["Superadmin","Admin","Author","Editor","Subscriber"];
       foreach ($roles as $urole){
         DB::table('roles')->insert([
         'role_name' => $urole,
         'role_slug' => 'R'.uniqid(20),
         'created_at' => Carbon::now()->toDateTimeString(),
     ]);

       }
    
    }
}
  