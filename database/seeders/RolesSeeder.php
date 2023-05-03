<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data  =[
            [
                'name'=>'super_admin',
                'display_name'=>'Super Admin',
                'description'=>'Have All Access'    
            ],
            [
                'name'=>'hr',
                'display_name'=>'Human Resources',
                'description'=>'Manage Employees'
            ],

        ];

        foreach($data as $d)
        {
            Role::create($d);
        }

    }
}
