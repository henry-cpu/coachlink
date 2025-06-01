<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSessionAssignment extends Model
{
    /** @use HasFactory<\Database\Factories\TrainingSessionAssignmentFactory> */
    use HasFactory;

    protected $fillable = [
        'training_session_id',
        'patient_id',
        'assigned_at',
        'status',
    ];
}
