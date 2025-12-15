<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;
use App\Models\Director;
use App\Models\Media;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    protected $model = Media::class;
    
    public function definition(): array
    {
        $formatos = ['Pelicula', 'Serie', 'Documental'];

        // IDs disponibles de géneros y directores
        $genreIds = Genre::pluck('id')->all();
        $directorIds = Director::pluck('id')->all();

        return [
            'titulo' => $this->faker->sentence(2), // título de 2 palabras
            'formato' => $this->faker->randomElement($formatos),
            'director' => $this->faker->randomElement($directorIds),
            'estreno' => $this->faker->numberBetween(1980, 2025),
        ];
    }
}
