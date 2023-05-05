<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'name'=>'show_user',
                'display_name'=>'Show User',
                'description'=>'عرض الموظفين'
            ],
            [
                'name'=>'add_user',
                'display_name'=>'Add User',
                'description'=>'اضافه موظف'
            ],
            [
                'name'=>'edit_user',
                'display_name'=>'Edit User',
                'description'=>'تعديل موظف'
            ],
            [
                'name'=>'delete_user',
                'display_name'=>'Delete User',
                'description'=>'حذف مستخدم'
            ],
            [
                'name'=>'show_role',
                'display_name'=>'show Role',
                'description'=>'عرض الادوار'
            ],
            [
                'name'=>'add_role',
                'display_name'=>'add Role',
                'description'=>'اضافة الادوار'
            ],

            [
                'name'=>'edit_role',
                'display_name'=>'Edit Role',
                'description'=>'تعديل الادوار'
            ],


            
            [
                'name'=>'show_employees',
                'display_name'=>'Show Employees',
                'description'=>'عرض موظف'
            ],
            [
                'name'=>'add_employees',
                'display_name'=>'Add Employees',
                'description'=>'اضافه موظف'
            ],

            
            [
                'name'=>'edit_employees',
                'display_name'=>'Edit Employees',
                'description'=>'تعديل موظف'
            ],
            [
                'name'=>'delete_employees',
                'display_name'=>'Delete Employees',
                'description'=>'حذف موظف'
            ],

            
            [
                'name'=>'show_login_history',
                'display_name'=>'Show Login History',
                'description'=>'تعديل موظف'
            ],

            [
                'name'=>'filter_employees',
                'display_name'=>'Filter Employees',
                'description'=>'تعديل موظف'
            ],

        ];

        foreach($data as $d)
        {
            Permission::create($d);
        }
    }
}
