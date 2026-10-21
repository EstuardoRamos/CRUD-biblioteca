<?php

namespace Database\Seeders;

use App\Models\Autor;
use App\Models\Libro;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $autores = Autor::factory(6)->create();

        Libro::factory(30)->recycle($autores)->create();
    }
}
