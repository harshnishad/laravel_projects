<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Task extends Model {
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'project_id'];

    /**
     * Get the project that owns the task.
     */
    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }
}
