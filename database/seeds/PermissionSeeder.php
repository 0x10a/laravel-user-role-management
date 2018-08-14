<?php

use URM\Permission;
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
        Permission::create( [
            'id'=>6,
            'name'=>'view_role',
            'display_name'=>'View role',
            'module'=>'role',
            'description'=>'This permission allows users to view all role entries entered in the system.',
            'created_at'=>'2017-11-26 01:07:58',
            'updated_at'=>'2017-11-26 01:07:58'
        ] );

        Permission::create( [
            'id'=>7,
            'name'=>'add_role',
            'display_name'=>'Add role',
            'module'=>'role',
            'description'=>'This permission allows users to add new role entry in the system.',
            'created_at'=>'2017-11-26 01:07:58',
            'updated_at'=>'2017-11-26 01:07:58'
        ] );

        Permission::create( [
            'id'=>8,
            'name'=>'edit_role',
            'display_name'=>'Edit role',
            'module'=>'role',
            'description'=>'This permission allows users to edit role entry in the system.',
            'created_at'=>'2017-11-26 01:07:58',
            'updated_at'=>'2017-11-26 01:07:58'
        ] );

        Permission::create( [
            'id'=>9,
            'name'=>'delete_role',
            'display_name'=>'Delete role',
            'module'=>'role',
            'description'=>'This permission allows users to delete any role entry from the system.',
            'created_at'=>'2017-11-26 01:07:58',
            'updated_at'=>'2017-11-26 01:07:58'
        ] );

        Permission::create( [
            'id'=>10,
            'name'=>'get_role',
            'display_name'=>'Get role Details',
            'module'=>'role',
            'description'=>'This permission allows users to get role entry details from the system by providing its id.',
            'created_at'=>'2017-11-26 01:07:58',
            'updated_at'=>'2017-11-26 01:07:58'
        ] );

        Permission::create( [
            'id'=>16,
            'name'=>'view_permission',
            'display_name'=>'View permission',
            'module'=>'permission',
            'description'=>'This permission allows users to view all permission entries entered in the system.',
            'created_at'=>'2017-11-26 01:16:57',
            'updated_at'=>'2017-11-26 01:16:57'
        ] );

        Permission::create( [
            'id'=>17,
            'name'=>'add_permission',
            'display_name'=>'Add permission',
            'module'=>'permission',
            'description'=>'This permission allows users to add new permission entry in the system.',
            'created_at'=>'2017-11-26 01:16:57',
            'updated_at'=>'2017-11-26 01:16:57'
        ] );

        Permission::create( [
            'id'=>18,
            'name'=>'edit_permission',
            'display_name'=>'Edit permission',
            'module'=>'permission',
            'description'=>'This permission allows users to edit permission entry in the system.',
            'created_at'=>'2017-11-26 01:16:57',
            'updated_at'=>'2017-11-26 01:16:57'
        ] );

        Permission::create( [
            'id'=>19,
            'name'=>'delete_permission',
            'display_name'=>'Delete permission',
            'module'=>'permission',
            'description'=>'This permission allows users to delete any permission entry from the system.',
            'created_at'=>'2017-11-26 01:16:57',
            'updated_at'=>'2017-11-26 01:16:57'
        ] );

        Permission::create( [
            'id'=>20,
            'name'=>'get_permission',
            'display_name'=>'Get permission Details',
            'module'=>'permission',
            'description'=>'This permission allows users to get permission entry details from the system by providing its id.',
            'created_at'=>'2017-11-26 01:16:57',
            'updated_at'=>'2017-11-26 01:16:57'
        ] );

        Permission::create( [
            'id'=>21,
            'name'=>'view_users',
            'display_name'=>'View users',
            'module'=>'users',
            'description'=>'This permission allows users to view all users entries entered in the system.',
            'created_at'=>'2017-11-26 15:18:45',
            'updated_at'=>'2017-11-26 15:18:45'
        ] );

        Permission::create( [
            'id'=>22,
            'name'=>'add_users',
            'display_name'=>'Add users',
            'module'=>'users',
            'description'=>'This permission allows users to add new users entry in the system.',
            'created_at'=>'2017-11-26 15:18:45',
            'updated_at'=>'2017-11-26 15:18:45'
        ] );

        Permission::create( [
            'id'=>23,
            'name'=>'edit_users',
            'display_name'=>'Edit users',
            'module'=>'users',
            'description'=>'This permission allows users to edit users entry in the system.',
            'created_at'=>'2017-11-26 15:18:45',
            'updated_at'=>'2017-11-26 15:18:45'
        ] );

        Permission::create( [
            'id'=>24,
            'name'=>'delete_users',
            'display_name'=>'Delete users',
            'module'=>'users',
            'description'=>'This permission allows users to delete any users entry from the system.',
            'created_at'=>'2017-11-26 15:18:45',
            'updated_at'=>'2017-11-26 15:18:45'
        ] );

        Permission::create( [
            'id'=>25,
            'name'=>'get_users',
            'display_name'=>'Get users Details',
            'module'=>'users',
            'description'=>'This permission allows users to get users entry details from the system by providing its id.',
            'created_at'=>'2017-11-26 15:18:45',
            'updated_at'=>'2017-11-26 15:18:45'
        ] );

        Permission::create( [
            'id'=>26,
            'name'=>'edit_profile',
            'display_name'=>'Edit Profile',
            'module'=>'users',
            'description'=>'This permission allows users to edit their own profile.',
            'created_at'=>'2017-11-27 20:28:23',
            'updated_at'=>'2017-11-27 20:28:55'
        ] );

        Permission::create( [
            'id'=>27,
            'name'=>'view_log',
            'display_name'=>'View Log',
            'module'=>'log',
            'description'=>'This permission allows users to view log of the application.',
            'created_at'=>'2017-11-27 22:32:03',
            'updated_at'=>'2017-11-27 22:32:03'
        ] );
    }
}
