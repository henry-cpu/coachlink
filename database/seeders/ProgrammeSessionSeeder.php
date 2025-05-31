<?php

namespace Database\Seeders;

use App\Models\Programme;
use App\Models\ProgrammeSession;
use App\Models\Session;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgrammeSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sessions = Session::all();
        $programmes = Programme::all();

        foreach ($sessions as $sessions) {
            $assignedProgrammes = $programmes->random(rand(1, 3)); // Assign 1 to 3 random programmes to each session
            
            foreach ($assignedProgrammes as $programme) {
                ProgrammeSession::firstOrCreate([
                    'session_id' => $sessions->id,
                    'programme_id' => $programme->id,
                ]);
            }
        }
    }
}
