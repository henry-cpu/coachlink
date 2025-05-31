<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\Programme;
use App\Models\ProgrammeExercise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levelMapping = [
            'beginner' => 1,
            'intermediate' => 2,
            'advanced' => 3,
            'expert' => 4,
        ];

        $reverseLevelMapping = array_flip($levelMapping);

        // On génère 20 programmes
        Programme::factory()->count(20)->create()->each(function ($programme) use ($levelMapping, $reverseLevelMapping) {
            
            $exercises = Exercise::inRandomOrder()->take(rand(4, 8))->get();

            $totalDuration = 0;
            $totalLevel = 0;

            foreach ($exercises as $index => $exercise) {
                // Générer durée et niveau pour chaque exercice
                $duration = rand(5, 20); // Random duration between 5 and 20 minutes
                $level = $this->fakerLevel();

                ProgrammeExercise::create([
                    'exercise_id' => $exercise->id,
                    'programme_id' => $programme->id,
                    'duration' => $duration,
                    'level' => $level,
                    'order' => $index + 1, // Order starts from 1
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Accumuler pour le calcul global
                $totalDuration += $duration;
                $totalLevel += $levelMapping[$level];
            }

            // Calcul du level global (moyenne arrondie)
            $averageLevelNumeric = round($totalLevel / count($exercises));
            $finalLevel = $reverseLevelMapping[$averageLevelNumeric];

            // Mettre à jour le programme
            $programme->update([
                'total_duration' => $totalDuration,
                'level' => $finalLevel,
            ]);
        });
    }

    private function fakerLevel()
    {
        return fake()->randomElement(['beginner', 'intermediate', 'advanced', 'expert']);
    }
}
