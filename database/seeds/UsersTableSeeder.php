<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array(
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'admin',
                'status'=>'active'
            ),
            array(
                'name'=>'User',
                'email'=>'user@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'user',
                'status'=>'active'
            ),
            array(
                'name'=>'Employee',
                'email'=>'employee@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'employee',
                'status'=>'active'
            ),
            array(
                'name'=>'Storekeeper',
                'email'=>'storekeeper@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'storekeeper',
                'status'=>'active'
            ),
            array(
                'name'=>'Manager',
                'email'=>'Manager@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'manager',
                'status'=>'active'
            ),
            array(
                'name'=>'Salesman',
                'email'=>'Salesman@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'salesman',
                'status'=>'active'
            ),
        );

        DB::table('users')->insert($data);
    }
}
