<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role=Role::create([
            'name'=>'admin',
        ]);

        User::create([
            'name'=>'admin',
            'role_id'=>$role->id,
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123456'),
        ]);
    }
}
