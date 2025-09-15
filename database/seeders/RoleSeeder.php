<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Roles
        $bibliotecario = Role::create(['name' => 'bibliotecario']);
        $estudiante = Role::create(['name' => 'estudiante']);

        //-----------------------
        //CONTENEDOR CON PERMISOS
        //-----------------------

        //Permisos de Gestionar libros
        Permission::create(['name' => 'libros.catalogo']);
        Permission::create(['name' => 'libros.index']);
        Permission::create(['name' => 'libros.store']);
        Permission::create(['name' => 'libros.show']);
        Permission::create(['name' => 'libros.update']);
        Permission::create(['name' => 'libros.delete']);

        //Permisos de Gestionar Estudiantes
        Permission::create(['name' => 'estudiantes.index']);
        Permission::create(['name' => 'estudiantes.store']);
        Permission::create(['name' => 'estudiantes.show']);
        Permission::create(['name' => 'estudiantes.update']);
        Permission::create(['name' => 'estudiantes.delete']);

        //Permisos de Gestionar Prestamos
        Permission::create(['name' => 'prestamos.pedir']);
        Permission::create(['name' => 'prestamos.asignar']);
        Permission::create(['name' => 'prestamos.delete']);
        
        


        //-----------------------
        //ASIGNAR PERMISOS
        //-----------------------

        $bibliotecario->givePermissionTo(Permission::all());

        $estudiante->givePermissionTo([
        'libros.index',
        'prestamos.pedir',
        'libros.catalogo'
        ]);


    }
}
