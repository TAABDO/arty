<?php

namespace Database\Factories;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'status' => $this->faker->numberBetween(0, 1),
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'budget' => $this->faker->randomNumber(),
            'partner_id' => $this->faker->randomNumber(),
        ];
    }
}
