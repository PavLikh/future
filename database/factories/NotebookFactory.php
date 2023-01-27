<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Notebook;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notebook>
 */
class NotebookFactory extends Factory
{
    protected $model = Notebook::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'full_name' => fake()->name(),
            'company' => ucfirst(fake()->words(mt_rand(1, 2), true)),
            'phone' => fake()->numerify('#######'),
            'email' => fake()->unique()->safeEmail(),
            'birth_date' => fake()->dateTimeInInterval('-70 years', '+55 years'),
            'photo' => fake()->image(null, 640, 480)
        ];
    }
}
