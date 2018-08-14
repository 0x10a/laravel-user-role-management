<?php

use URM\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create( [
            'id'=>1,
            'name'=>'Developer',
            'email'=>'developer@demo.com',
            'password'=>'$2y$10$lpgZT.NHF2MShUamsihGvO68puOv7ToD/5Sn/wOQFL.Rs7KhgH50C',
            'last_login'=>'1511841129',
            'remember_token'=>'9jKzo0qEbyJrAxFf2XeO2gIWTnkpILsAYkf06G0omKoRt2EB3Meg95YuoLTs',
            'created_at'=>'2017-11-26 00:43:03',
            'updated_at'=>'2017-11-27 22:52:09'
        ] );



        User::create( [
            'id'=>3,
            'name'=>'Staff',
            'email'=>'staff@demo.com',
            'password'=>'$2y$10$m3oAvURkLPbG6okKci4EC.B7uQFgKqJxl50pJSJVXnlswp3SA8lLy',
            'last_login'=>'1511731000',
            'remember_token'=>NULL,
            'created_at'=>'2017-11-26 16:16:40',
            'updated_at'=>'2017-11-26 16:16:40'
        ] );



        User::create( [
            'id'=>5,
            'name'=>'Admin',
            'email'=>'admin@demo.com',
            'password'=>'$2y$10$pd9/0qkqAZQ1zwb6RF34cOmawsQmSAVjeoi7wlFNoxE3oDETyC/U6',
            'last_login'=>NULL,
            'remember_token'=>NULL,
            'created_at'=>'2017-11-26 16:19:34',
            'updated_at'=>'2017-11-26 16:19:34'
        ] );

    }
}
