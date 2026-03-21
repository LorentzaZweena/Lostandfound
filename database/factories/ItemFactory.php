<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $images = [
            'img/bag.jpg',
            'img/files.jpg',
            'img/key.jpg',
            'img/makeup.jpg',
            'img/phone.jpg',
        ];

        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'category' => $this->faker->randomElement(['Electronics', 'Clothing', 'Accessories', 'Documents', 'Other']),
            'location' => $this->faker->city(),
            'status' => $this->faker->randomElement(['lost', 'found']),
            'contact_email' => $this->faker->safeEmail(),
            'image' => $this->faker->randomElement($images),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()
        ];
    }
}
