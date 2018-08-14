<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RolesPermissionSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UsersRoleSeeder::class);
    }
}
