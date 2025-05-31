<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Programme>
 */
class ProgrammeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $programmes = [
            'Full Body Strength' => 'A complete program targeting all major muscle groups.',
            'Cardio Blast' => 'High-intensity cardio program for endurance and fat loss.',
            'Rehabilitation Plan' => 'Specialized rehab exercises for injury recovery.',
            'Senior Mobility' => 'Gentle exercises to maintain mobility and flexibility for seniors.',
            'Posture Correction' => 'Exercises to improve posture and core stability.',
            'Fat Burn Challenge' => 'Intensive sessions focused on rapid fat burning.',
            'Leg Day Special' => 'Focused program for building lower body strength.',
            'Upper Body Power' => 'Strength program targeting chest, shoulders and arms.',
            'Core Stabilization' => 'Core strengthening exercises for balance and posture.',
            'HIIT Beginner Plan' => 'High-intensity interval training for beginners.'
        ];

        $title = $this->faker->randomElement(array_keys($programmes));
        $description = $programmes[$title];

        $coach = User::where('role', 'coach')->inRandomOrder()->first();

        return [
            'title' => $title,
            'description' => $description,
            'coach_id' => optional($coach)->id,
            'total_duration' => 0,
            'level' => null, // Default level, can be adjusted later
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
