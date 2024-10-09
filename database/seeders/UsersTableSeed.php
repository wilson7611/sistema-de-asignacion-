<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // usuario con el rol editor
        $editor = User::create([
            'name' => 'estudiante',
            'email' => 'estudiante@gmail.com',
            'password' => '123456'
          ]);
  
          $editor->assignRole('estudiante');
  
          // usuario con el rol moderador
          $moderador = User::create([
            'name' => 'docente',
            'email' => 'docente@gmail.com',
            'password' => '123456'
          ]);
  
          $moderador->assignRole('docente');
  
          // usuario con el rol super-admin
          $admin = User::create([
            'name' => 'decano',
            'email' => 'decano@gmail.com',
            'password' => '123456'
          ]);
  
          $admin->assignRole('decano');
    }
}
