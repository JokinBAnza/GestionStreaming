<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Genre;
use App\Models\Director;
use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuario de prueba
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('12345678'),
            ]
        );

        // Crear géneros manualmente
        Genre::create(['nombre' => 'Acción']);
        Genre::create(['nombre' => 'Comedia']);
        Genre::create(['nombre' => 'Drama']);
        Genre::create(['nombre' => 'Documental']);
        Genre::create(['nombre' => 'Aventura']);
        Genre::create(['nombre' => 'Thriller']);
        Genre::create(['nombre' => 'Terror']);

        // Crear directores manualmente
        Director::create(['nombre' => 'Steven Spielberg', 'anoNacimiento' => 1946]);
        Director::create(['nombre' => 'Christopher Nolan', 'anoNacimiento' => 1970]);
        Director::create(['nombre' => 'David Attenborough', 'anoNacimiento' => 1926]);

        // Lista de títulos “reales”
        $titulos = [
            'El Último Amanecer',
            'Sombras de la Ciudad',
            'Corazón de Hielo',
            'La Aventura Prohibida',
            'Ecos del Pasado',
            'Horizonte Perdido',
            'Furia Inesperada',
            'Secretos de Medianoche',
            'Camino a la Libertad',
            'Sueños Rotos'
        ];

        // Crear medias usando la factory pasando los títulos
       // Crear medias usando la factory pasando los títulos y rellenando la tabla pivote
        Media::factory(10)
            ->sequence(fn ($sequence) => ['titulo' => $titulos[$sequence->index]])
            ->create()
            ->each(function ($media) {
                $genreIds = Genre::pluck('id')->toArray();
                // Asigna entre 1 y 3 géneros aleatorios a cada media
                $media->genres()->attach(array_rand(array_flip($genreIds), rand(1, 3)));
            });

    }
}
