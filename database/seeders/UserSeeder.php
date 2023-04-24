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
            'lastname' => 'Riesco',
            'branchoffice' => 'Torreón',
            'email' => 'jared@hotmail.com',
            'password' => bcrypt('admin'),
            'area' => 3
        ]);
        
        $user = User::create([
            'name' => 'Supervisor',
            'lastname' => 'Rodriguez',
            'branchoffice' => 'Torreón',
            'email' => 'amaurym.rodriguez@hotmail.com',
            'password' => bcrypt('admin'),
            'area' => 2
        ]);

        $user = User::create([
            'name' => 'Mortal',
            'lastname' => 'Rivera',
            'branchoffice' => 'Torreón',
            'email' => 'rivera@hotmail.com',
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
