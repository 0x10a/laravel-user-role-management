<?php

use URM\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create( [
            'id'=>1,
            'name'=>'admin',
            'display_name'=>'Admin',
            'description'=>'Admin cannot handle permissions',
            'created_at'=>'2017-11-26 15:21:40',
            'updated_at'=>'2017-11-27 00:31:36'
        ] );



        Role::create( [
            'id'=>2,
            'name'=>'staff',
            'display_name'=>'Staff',
            'description'=>'Staff can only handle users',
            'created_at'=>'2017-11-26 16:12:06',
            'updated_at'=>'2017-11-27 00:31:12'
        ] );



        Role::create( [
            'id'=>3,
            'name'=>'developer',
            'display_name'=>'Developer',
            'description'=>'Developer has all the permissions in the system.',
            'created_at'=>'2017-11-26 16:13:38',
            'updated_at'=>'2017-11-26 16:13:38'
        ] );
    }
}
