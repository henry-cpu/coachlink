<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TrainingSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coaches = User::where('role', 'coach')->get();
        $sessionCount = rand(3, 5);

        $sessionData = [
        'Initial Assessment and Planning' => 'Evaluation complète de l’état physique du patient et définition des objectifs du programme.',
        'Strength and Conditioning' => 'Séance axée sur le renforcement musculaire global et l’amélioration de la condition physique.',
        'Cardio & Endurance Focus' => 'Entraînement cardio pour améliorer l’endurance et la capacité respiratoire.',
        'Rehabilitation and Recovery' => 'Travail doux pour la récupération post-blessure et la mobilité articulaire.',
        'Senior Mobility Session' => 'Séance dédiée à l’amélioration de la mobilité et de l’équilibre chez les patients seniors.',
        'Core Stability and Posture' => 'Renforcement des muscles profonds pour stabiliser le tronc et corriger la posture.',
        'Fat Burn Intensive' => 'Séance haute intensité pour favoriser la perte de graisse et booster le métabolisme.',
        'Flexibility & Stretching' => 'Travail de la souplesse pour améliorer l’amplitude des mouvements et prévenir les blessures.',
        'Upper Body Power Session' => 'Entraînement ciblé sur le haut du corps (poitrine, épaules, bras).',
        'Full Body Circuit Training' => 'Enchaînement d’exercices complets pour un travail musculaire et cardio global.'
        ];

        foreach ($coaches as $coach){
            for ($i = 0; $i < $sessionCount; $i++) {

                $title = fake()->randomElement(array_keys($sessionData));
                $description = $sessionData[$title];

                TrainingSession::create([
                    'coach_id' => $coach->id,
                    'title' => $title,
                    'description' => $description,
                    'scheduled_at' => now()->addDays(rand(1, 30))->addHours(rand(8, 18)),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

    }
}
