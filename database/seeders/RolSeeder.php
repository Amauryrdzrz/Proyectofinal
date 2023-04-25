<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = new Rol();
        $rol->area = "Usuario Común";
        $rol->save();

        $rol1 = new Rol();
        $rol1->area = "Supervisor";
        $rol1->save();

        $rol = new Rol();
        $rol->area = "Administrador";
        $rol->save();
    }
}
