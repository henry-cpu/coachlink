<?php

namespace Database\Seeders;

use App\Models\Session;
use App\Models\SessionAssignment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patients = User::where('role', 'patient')->get();
        $sessions = Session::all();

        foreach ($sessions as $session) {

            $assignedPatients = $patients->random(rand(3, 6)); // Assign 3 to 6 random patients to each session

            foreach ($assignedPatients as $patient) {
                $date = now()->subDays(rand(-5, 15));

                if ($date->isFuture()) {
                    $status = 'planned'; // Future dates are considered planned
                } else {
                    $status = fake()->randomElement(['completed', 'missed']);
                }

                SessionAssignment::firstOrCreate([
                    'session_id' => $session->id,
                    'patient_id' => $patient->id, // Assign a random patient to each session
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
