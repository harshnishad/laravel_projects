<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model {
    use HasFactory;

    protected $fillable = ['name', 'description'];

    /**
     * The users assigned to the project.
     */
    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'project_user')->withTimestamps();
    }

    /**
     * Get all tasks for the project.
     */
    public function tasks(): HasMany {
        return $this->hasMany(Task::class);
    }
}
