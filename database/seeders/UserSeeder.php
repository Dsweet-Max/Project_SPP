<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *p
     * @return void
     */
    public function run()
    {
       $user = [
        [
            'name' => 'Administrator',
            'username' =>'admin',
            'password' =>bcrypt('123456'),
            'level' => 1,
            'email' =>'admin@gmail.com',
        ],
        // [
        //     'name' => 'Aprillia Anggraeni',
        //     'username' =>'ucing',
        //     'password' =>bcrypt('123456'),
        //     'level' => 1,
        //     'email' =>'aprilucing@gmail.com',
        // ],
        // [
        //     'name' => 'Nanda Eka Saputra',
        //     'username' =>'cubluk',
        //     'password' =>bcrypt('123456'),
        //     'level' => 1,
        //     'email' =>'nandacubluk@gmail.com',
        // ],
        [
            'name' => 'Petugas',
            'username' =>'petugas',
            'password' =>bcrypt('123456'),
            'level' => 2,
            'email' =>'petugas@gmail.com',
        ], 
    ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
