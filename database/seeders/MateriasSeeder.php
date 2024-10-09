<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materia;
use App\Models\User;
use Spatie\Permission\Models\Role;

class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles (si no lo has hecho aún)
        // Role::firstOrCreate(['name' => 'estudiante']);
        // Role::firstOrCreate(['name' => 'docente']);
        // Role::firstOrCreate(['name' => 'decano']);

        // Crear usuarios
        // $user1 = User::create([
        //     'name' => 'Estudiante Juan',
        //     'email' => 'estudiante1@example.com',
        //     'password' => bcrypt('password'),
        // ]);
        // $user1->assignRole('estudiante');

        // $user2 = User::create([
        //     'name' => 'Docente Ana',
        //     'email' => 'docente1@example.com',
        //     'password' => bcrypt('password'),
        // ]);
        // $user2->assignRole('docente');

        // $user3 = User::create([
        //     'name' => 'Decano Pedro',
        //     'email' => 'decano1@example.com',
        //     'password' => bcrypt('password'),
        // ]);
        // $user3->assignRole('decano');

        // // Crear materias sin prerequisito
        // $materia1 = Materia::create([
        //     'nombre' => 'Introducción a la Programación',
        //     'codigo' => 'PROG101',
        //     'semestre' => '1',
        //     'cupos_minimos' => 10,
        //     'cupos_maximos' => 50,
        //     'estado' => 'pendiente',
        //     'prerequisito_id' => null,
        // ]);

        // // Crear materias con prerequisito
        // $materia2 = Materia::create([
        //     'nombre' => 'Programación Avanzada',
        //     'codigo' => 'PROG201',
        //     'semestre' => '2',
        //     'cupos_minimos' => 10,
        //     'cupos_maximos' => 40,
        //     'estado' => 'pendiente',
        //     'prerequisito_id' => $materia1->id, // Prerequisito: Introducción a la Programación
        // ]);

        // $materia3 = Materia::create([
        //     'nombre' => 'Estructuras de Datos',
        //     'codigo' => 'PROG301',
        //     'semestre' => '3',
        //     'cupos_minimos' => 10,
        //     'cupos_maximos' => 35,
        //     'estado' => 'pendiente',
        //     'prerequisito_id' => $materia2->id, // Prerequisito: Programación Avanzada
        // ]);

        // // Más materias con otros prerequisitos
        // $materia4 = Materia::create([
        //     'nombre' => 'Bases de Datos',
        //     'codigo' => 'DB101',
        //     'semestre' => '3',
        //     'cupos_minimos' => 10,
        //     'cupos_maximos' => 30,
        //     'estado' => 'pendiente',
        //     'prerequisito_id' => $materia1->id, // Prerequisito: Introducción a la Programación
        // ]);

        // $materia5 = Materia::create([
        //     'nombre' => 'Ingeniería de Software',
        //     'codigo' => 'SW301',
        //     'semestre' => '4',
        //     'cupos_minimos' => 10,
        //     'cupos_maximos' => 25,
        //     'estado' => 'pendiente',
        //     'prerequisito_id' => $materia3->id, // Prerequisito: Estructuras de Datos
        // ]);

        for ($i = 2; $i <= 7; $i++) {
            $estudiante = User::create([
                'name' => "Estudiante $i",
                'email' => "estudiante$i@example.com",
                'password' => bcrypt('password'),
            ]);
            $estudiante->assignRole('estudiante');
        }
        for ($i = 2; $i <= 4; $i++) {
            $docente = User::create([
                'name' => "Docente $i",
                'email' => "docente$i@example.com",
                'password' => bcrypt('password'),
            ]);
            $docente->assignRole('docente');
        }
    }
}
