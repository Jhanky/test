<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Milestone extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'project_id',
        'type_id',
        'date',
        'title',
        'description',
        'responsible',
        'participants',
        'notes',
        'state',
        'order',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'date' => 'date',
        'participants' => 'array',
        'order' => 'integer',
        'is_active' => 'boolean',
        'state' => 'string',
    ];

    // Relations
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(MilestoneType::class, 'type_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'milestone_id');
    }

    // Accessors
    public function getParticipantsAttribute($value)
    {
        return $value ? json_decode($value, true) : [];
    }

    public function setParticipantsAttribute($value)
    {
        $this->attributes['participants'] = $value ? json_encode($value) : null;
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByState($query, $state)
    {
        return $query->where('state', $state);
    }

    public function scopeByProject($query, $projectId)
    {
        return $query->where('project_id', $projectId);
    }

    public function scopeByType($query, $typeId)
    {
        return $query->where('type_id', $typeId);
    }

    public function scopeCompleted($query)
    {
        return $query->where('state', 'completed');
    }

    public function scopePending($query)
    {
        return $query->where('state', 'pending');
    }
}