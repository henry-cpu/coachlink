<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machine>
 */
class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            'Treadmill' => 'A cardio machine used for walking or running in place.',
            'Elliptical Trainer' => 'Low-impact machine for full-body cardio workouts.',
            'Rowing Machine' => 'Simulates rowing to strengthen back and arms.',
            'Leg Press' => 'Machine focused on building leg strength through presses.',
            'Lat Pulldown' => 'Targets upper back and lats through pulling motion.',
            'Smith Machine' => 'Guided barbell system for various strength exercises.',
            'Cable Crossover' => 'Adjustable cables for chest and shoulder workouts.',
            'Chest Press' => 'Strengthens chest, shoulders and triceps.',
            'Stationary Bike' => 'Indoor cycling machine for cardio and leg endurance.',
            'Leg Curl' => 'Isolates hamstrings by curling legs back.'
        ];

        $title = $this->faker->randomElement(array_keys($titles));

        return [
            'name' => $title,
            'description' => $titles[$title],
            'ident_number' => strtoupper($this->faker->bothify('MCH-####-??')),
            'location' => $this->faker->randomElement(['Room A', 'Room B', 'Cardio Zone', 'Strength Zone', 'Rehab Area']),
            'link' => $this->faker->url(),
            'status' => 'available', // Default status, can be set later
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
