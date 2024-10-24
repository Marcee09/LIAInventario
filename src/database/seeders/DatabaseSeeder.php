<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder {
    public function run(): void {
        fake()->seed(10);   // Esto es para generar siempre los mismos datos
        $this->call(PermissionsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(AssetSeeder::class);

        User::create([
            'name' => 'Marcela',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'role' => 'root', // Asegúrate de asignar el rol de administrador
        ]);
    }


}

