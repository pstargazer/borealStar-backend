<?php

namespace Database\Factories;

use Faker\Core\Coordinates;
use Illuminate\Database\Eloquent\Factories\Factory;

// use MStaack\LaravelPostgis\Eloquent\PostgisTrait;
use MStaack\LaravelPostgis\Geometries\Point;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spot>
 */
class SpotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'coordinates' => new Point(fake()->latitude(), fake()->longitude()),
            'created_at' => date_timestamp_get(now())
        ];
    }
}
