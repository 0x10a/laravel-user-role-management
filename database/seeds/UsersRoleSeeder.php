<?php

use URM\Roleuser;
use Illuminate\Database\Seeder;

class UsersRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roleuser::create( [
            'user_id'=>1,
            'role_id'=>3
        ] );



        Roleuser::create( [
            'user_id'=>3,
            'role_id'=>2
        ] );



        Roleuser::create( [
            'user_id'=>5,
            'role_id'=>1
        ] );
    }
}
