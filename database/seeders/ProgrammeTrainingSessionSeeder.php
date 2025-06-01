<?php

namespace Database\Seeders;

use App\Models\Programme;
use App\Models\ProgrammeTrainingSession;
use App\Models\TrainingSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgrammeTrainingSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainingSessions = TrainingSession::all();
        $programmes = Programme::all();

        foreach ($trainingSessions as $trainingSession) {
            $assignedProgrammes = $programmes->random(rand(1, 3)); // Assign 1 to 3 random programmes to each session
            
            foreach ($assignedProgrammes as $programme) {
                ProgrammeTrainingSession::firstOrCreate([
                    'training_session_id' => $trainingSession->id,
                    'programme_id' => $programme->id,
                ]);
            }
        }
    }
}
