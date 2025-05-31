<?php

namespace Database\Seeders;

use App\Models\CoachPatient;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoachPatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coachs = User::where('role', 'coach')->get();
        $patients = User::where('role', 'patient')->get();

        foreach ($coachs as $coach){
            $assignedPatients = $patients->random(rand(2, 10)); // Assign 1 to 5 random patients to each coach
            foreach ($assignedPatients as $patient) {
                CoachPatient::firstOrCreate([
                    'coach_id' => $coach->id,
                    'patient_id' => $patient->id,
                ]);
            }
        }
    }
}
