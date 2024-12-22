<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {




        // users Dashboard
        Permission::create([
            'name'         => 'dashboard-list',
            'display_name' => 'عرض لوحة التحكم',
        ]);





        // users permissions
        Permission::create([
            'name'         => 'users-list',
            'display_name' => 'عرض المستخدمين',
        ]);
        Permission::create([
            'name'         => 'users-create',
            'display_name' => 'اضافة المستخدمين',
        ]);
        Permission::create([
            'name'         => 'users-edit',
            'display_name' => 'تعديل المستخدمين',
        ]);
        Permission::create([
            'name'         => 'users-delete',
            'display_name' => 'حذف المستخدمين',
        ]);

        // roles permissions
        Permission::create([
            'name'         => 'roles-list',
            'display_name' => 'عرض مستوى الصلاحيات',
        ]);
        Permission::create([
            'name'         => 'roles-create',
            'display_name' => 'اضافة مستوى الصلاحيات',
        ]);
        Permission::create([
            'name'         => 'roles-edit',
            'display_name' => 'تعديل مستوى الصلاحيات',
        ]);
        Permission::create([
            'name'         => 'roles-delete',
            'display_name' => 'حذف مستوى الصلاحيات',
        ]);

        // roles permissions
        Permission::create([
            'name'         => 'services-list',
            'display_name' => 'عرض الخدمات',
        ]);
        Permission::create([
            'name'         => 'services-create',
            'display_name' => 'اضافة خدمه',
        ]);
        Permission::create([
            'name'         => 'services-edit',
            'display_name' => 'تعديل خدمه',
        ]);
        Permission::create([
            'name'         => 'services-delete',
            'display_name' => 'حذف خدمه',
        ]);

        // roles permissions
        Permission::create([
            'name'         => 'articles-list',
            'display_name' => 'عرض المقالات',
        ]);
        Permission::create([
            'name'         => 'articles-create',
            'display_name' => 'اضافة مقال',
        ]);
        Permission::create([
            'name'         => 'articles-edit',
            'display_name' => 'تعديل مقال',
        ]);
        Permission::create([
            'name'         => 'articles-delete',
            'display_name' => 'حذف مقال',
        ]);

        // projects permissions
        Permission::create([
            'name'         => 'projects-list',
            'display_name' => 'عرض المشاريع',
        ]);
        Permission::create([
            'name'         => 'projects-create',
            'display_name' => 'اضافة مشروع',
        ]);
        Permission::create([
            'name'         => 'projects-edit',
            'display_name' => 'تعديل مشروع',
        ]);
        Permission::create([
            'name'         => 'projects-delete',
            'display_name' => 'حذف مشروع',
        ]);

        // packages permissions
        Permission::create([
            'name'         => 'packages-list',
            'display_name' => 'عرض الباقات',
        ]);
        Permission::create([
            'name'         => 'packages-create',
            'display_name' => 'اضافة باقه',
        ]);
        Permission::create([
            'name'         => 'packages-edit',
            'display_name' => 'تعديل باقه',
        ]);
        Permission::create([
            'name'         => 'packages-delete',
            'display_name' => 'حذف باقه',
        ]);

        // packages permissions
        Permission::create([
            'name'         => 'testimonials-list',
            'display_name' => 'عرض اراء الناس',
        ]);
        Permission::create([
            'name'         => 'testimonials-create',
            'display_name' => 'اضافة رأي',
        ]);
        Permission::create([
            'name'         => 'testimonials-edit',
            'display_name' => 'تعديل رأي',
        ]);
        Permission::create([
            'name'         => 'testimonials-delete',
            'display_name' => 'حذف رأي',
        ]);

        // packages permissions
        Permission::create([
            'name'         => 'contactus-list',
            'display_name' => 'عرض اتصل بنا',
        ]);


        // social_links permissions
        Permission::create([
            'name'         => 'social_links-list',
            'display_name' => 'لينكات السوشيال ميديا',
        ]);
        Permission::create([
            'name'         => 'social_links-create',
            'display_name' => 'اضافة لينك',
        ]);
        Permission::create([
            'name'         => 'social_links-edit',
            'display_name' => 'تعديل لينك',
        ]);
        Permission::create([
            'name'         => 'social_links-delete',
            'display_name' => 'حذف لينك',
        ]);



        // settings permissions
        Permission::create([
            'name'         => 'settings',
            'display_name' => 'الاعدادات',
        ]);



        // settings permissions
        Permission::create([
            'name'         => 'terms',
            'display_name' => 'شروط واحكام',
        ]);
    }
}
