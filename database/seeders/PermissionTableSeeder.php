<?php

namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'dashborad-list',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'category-list',
           'category-create',
           'category-edit',
           'category-delete',
           'course-list',
           'course-create',
           'course-edit',
           'course-delete',
           'title-list',
           'title-create',
           'title-edit',
           'title-delete',
           'subtitle-list',
           'subtitle-create',
           'subtitle-edit',
           'subtitle-delete',
           'order-list',
           'order-delete',
           'faq-list',
           'faq-create',
           'faq-edit',
           'faq-delete',
           'reviewimage-list',
           'reviewimage-create',
           'reviewimage-edit',
           'reviewimage-delete',
           'reviewvideo-list',
           'reviewvideo-create',
           'reviewvideo-edit',
           'reviewvideo-delete',
           'city-list',
           'city-create',
           'city-edit',
           'city-delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
