<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrador',
            'lastname' => 'De la O',
            'branchoffice' => 'Torreón',
            'email' => 'Addccelerator@hotmail.com',
            'password' => bcrypt('admin'),
            'area' => 3
        ]);
        
        $user = User::create([
            'name' => 'Supervisor',
            'lastname' => 'Slim Saucedo',
            'branchoffice' => 'Torreón',
            'email' => 'RafaSauBlas@hotmail.com',
            'password' => bcrypt('admin'),
            'area' => 2
        ]);

        $user = User::create([
            'name' => 'Mortal',
            'lastname' => 'Saucedo',
            'branchoffice' => 'Torreón',
            'email' => 'mortal@hotmail.com',
            'password' => bcrypt('admin'),
            'area' => 1
        ]);

        // $user2 = User::create([
        //     'name' => '',
        //     'lastname' => '',
        //     'branchoffice' => '',
        //     'email' => '',
        //     'password' => bcrypt(),
        //     'area' => 2
        // ]);


        // $user3 = User::create([
        //     'name' => '',
        //     'lastname' => '',
        //     'branchoffice' => '',
        //     'email' => '',
        //     'password' => bcrypt(),
        //     'area' => 2
        // ]);



    }
}
