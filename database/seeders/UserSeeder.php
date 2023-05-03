<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user =  User::create([
            'name'=>'SuperAdmin',
            'email'=>'superadmin@admin.com',
            'password'=>Hash::make('password'),
            'status'=>true
        ]);
        $user->attachRole('super_admin');
    }
}
