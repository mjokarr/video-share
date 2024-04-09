<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'url' => 'https://www.aparat.com/v/xfUm2',
            'length' => rand(100,999),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'thumbnail' => 'https://loremflickr.com/320/240?random=' . rand(1,1000),
        ];
    }
}
