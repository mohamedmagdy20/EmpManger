<?php

namespace Database\Seeders;

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
        ];
    }
}
