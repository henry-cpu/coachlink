<?php

namespace Database\Factories;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exercise>
 */
class ExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $exercisesWithMachine = [
            'Treadmill Running' => ['desc' => 'Running on a treadmill to improve cardiovascular endurance.', 'machine_name' => 'Treadmill'],
            'Elliptical Training' => ['desc' => 'Low-impact full-body cardio on an elliptical.', 'machine_name' => 'Elliptical Trainer'],
            'Rowing' => ['desc' => 'Rowing motion to strengthen back and arms.', 'machine_name' => 'Rowing Machine'],
            'Leg Press Exercise' => ['desc' => 'Strengthen legs using leg press machine.', 'machine_name' => 'Leg Press'],
            'Lat Pulldown Exercise' => ['desc' => 'Back workout focusing on latissimus dorsi muscles.', 'machine_name' => 'Lat Pulldown'],
            'Smith Squat' => ['desc' => 'Squatting using the Smith Machine for controlled motion.', 'machine_name' => 'Smith Machine'],
            'Cable Chest Fly' => ['desc' => 'Chest workout using adjustable cable crossovers.', 'machine_name' => 'Cable Crossover'],
            'Chest Press Exercise' => ['desc' => 'Strength training targeting chest and triceps.', 'machine_name' => 'Chest Press'],
            'Stationary Biking' => ['desc' => 'Indoor cycling to improve stamina.', 'machine_name' => 'Stationary Bike'],
            'Leg Curl Exercise' => ['desc' => 'Isolates and strengthens hamstrings.', 'machine_name' => 'Leg Curl']
        ];

        $exercisesWithoutMachine = [
            'Push-Up' => 'Classic bodyweight chest exercise.',
            'Air Squat' => 'Bodyweight squat to strengthen legs.',
            'Plank Hold' => 'Core stability and strength.',
            'Lunges' => 'Leg exercise for balance and strength.',
            'Burpees' => 'Full-body conditioning exercise.',
            'Sit-Ups' => 'Abdominal strength exercise.',
            'Mountain Climbers' => 'Cardio core exercise.',
            'Jumping Jacks' => 'Full-body warm-up exercise.'
        ];
        
        $isMachineExercise = $this->faker->boolean(70); // 70% chance of being a machine exercise

        if ($isMachineExercise) {
            $title = $this->faker->randomElement(array_keys($exercisesWithMachine));
            $machineName = $exercisesWithMachine[$title]['machine_name'];
            $machine = Machine::where('name', $machineName)->inRandomOrder()->first();
            $machine_id = optional($machine)->id;
            $description = $exercisesWithMachine[$title]['desc'];
        } else {
            $title = $this->faker->randomElement(array_keys($exercisesWithoutMachine));
            $machine_id = null;
            $description = $exercisesWithoutMachine[$title];
        }
        return [
            'title' => $title,
            'description' => $description,
            'machine_id' => $machine_id,
            'link' => $this->faker->url(),
            'video_url' => $this->faker->url(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
