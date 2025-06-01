<?php

namespace Database\Seeders;

use App\Models\TrainingSession;
use App\Models\TrainingSessionAssignment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSessionAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patients = User::where('role', 'patient')->get();
        $trainingSessions = TrainingSession::all();

        foreach ($trainingSessions as $trainingSession) {

            $assignedPatients = $patients->random(rand(3, 6)); // Assign 3 to 6 random patients to each trainingSession

            foreach ($assignedPatients as $patient) {
                $date = now()->subDays(rand(-5, 15));

                if ($date->isFuture()) {
                    $status = 'planned'; // Future dates are considered planned
                } else {
                    $status = fake()->randomElement(['completed', 'missed']);
                }

                TrainingSessionAssignment::firstOrCreate([
                    'training_session_id' => $trainingSession->id,
                    'patient_id' => $patient->id, // Assign a random patient to each trainingSession
                ], [
                    'assigned_at' => $date,  // You can set the assigned_at timestamp if needed
                    'status' => $status, // Set the status based on the date
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            
        }
    }
}
