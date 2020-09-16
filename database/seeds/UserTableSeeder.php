<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [   
                'name' => 'habiba boujmil', 
                'email'=>'boujmil.habiba95@gmail.com',
                'password'=>Hash::make('habiba'),
                'created_at' => Carbon::now(),
            ]);
        DB::table('users')->insert(
            [
                'name' => 'sarra boujmil', 
                'email'=>'boujmil.sarra2005@gmail.com',
                'password'=>Hash::make('sarra'),
                'created_at' => Carbon::now(),
            ]);
    }
}
