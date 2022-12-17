<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $users=[
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'phone'=>'11223344556688',
                'password'=> bcrypt('12345678'),
                'role'=>'1',
                
            ]
        ];

        foreach ($users as $key => $value) {
           User::create($value);
        }
    }
}
