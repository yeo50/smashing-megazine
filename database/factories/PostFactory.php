<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 10),
            'category_id' => fake()->numberBetween(1, 10),
            'title' => fake()->sentence(1),
            'photo' => fake()->imageUrl(640, 480, 'animals', true),
            'description' => fake()->sentence(15),
            'is_featured' => rand(0, 1),

        ];
    }
}
