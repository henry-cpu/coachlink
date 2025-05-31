<?php

namespace Database\Seeders;

use App\Models\Machine;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $machines = Machine::factory()->count(30)->create([]);

        $users = User::whereIn('role', ['coach', 'patient'])->get(); // Get all users who are coaches or patients

        foreach ($machines as $machine) {
            
            $status = fake()->randomElement(['available', 'in_use', 'maintenance', 'out_of_order']);

            $userId = null;

            if ($status === 'in_use' && $users->isNotEmpty()) {
                $userId = $users->random()->id; // Assign a random user if the machine is in use
            }

            $machine->update([
                'status' => $status,
                'user_id' => $userId, // Set user_id to null if not in use
            ]);
        }
    }
}
