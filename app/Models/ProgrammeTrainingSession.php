<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammeTrainingSession extends Model
{
    /** @use HasFactory<\Database\Factories\ProgrammeTrainingSessionFactory> */
    use HasFactory;

    protected $fillable = [
        'programme_id',
        'training_session_id',
    ];
}
