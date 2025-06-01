<?php

namespace Database\Seeders;

use App\Models\ProgrammeTrainingSession;
use App\Models\TrainingSessionAssignment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default admin user
        // This user will be used to access the admin dashboard

        User::factory()->create([
            'fname' => 'Henry',
            'lname' => 'Admin',
            'email' => 'haroldndefo@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('password'), // Use a secure password  
            'email_verified_at' => now(),  
        ]);

        User::factory()->count(2)->create([
            'role' => 'admin',
        ]);

        User::factory()->count(10)->create([
            'role' => 'coach',
        ]);

        User::factory()->count(30)->create([
            'role' => 'patient',
        ]);
        // Coachpatient
        $this->call(CoachPatientSeeder::class);

        // Machine Seeder
        // This will create 30 machines in the database
        $this->call(MachineSeeder::class);

        // Exercise Seeder
        // This will create 100 exercises in the database
        $this->call(ExerciseSeeder::class);

        // Programme Seeder
        // This will create 100 programs in the database
        $this->call(ProgrammeSeeder::class);

        //TrainingSession Seeder
        $this->call(TrainingSessionSeeder::class);

        // ProgrammeTrainingSession Seeder
        $this->call(ProgrammeTrainingSessionSeeder::class);

        //TrainingSession assignment seeder
        $this->call(TrainingSessionAssignmentSeeder::class);
    }
}
