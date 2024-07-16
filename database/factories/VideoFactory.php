<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ybazli\Faker\Facades\Faker;
// use Ybazli\Faker\Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VideoFactory extends Factory
{
    /**q
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Faker::fullName(),
            'path' => 'https://www.aparat.com',
            'length' => rand(100,999),
            'slug' => $this->faker->slug(),
            'description' => Faker::sentence(),
            'thumbnail' => 'https://loremflickr.com/320/240?random=' . rand(1,1000),
            'category_id' => Category::first() ?? Category::Factory(),
            'user_id' => User::first() ?? User::Factory(),
        ];
    }
}
