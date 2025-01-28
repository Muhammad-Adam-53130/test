<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feed extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(tag::class)->withTimestamps()->withPivot('isActive');
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', true);
    }

    // Mutator for the 'title' attribute
    public function setTitleAttribute($value)
    {
        // Normalize the title by making it lowercase first, then apply the formatting
        $value = strtolower($value);  // Convert the entire string to lowercase
        
        // Convert each word to lowercase and then make the first letter of each word Uppercase
        $this->attributes['title'] = ucfirst(implode(' ', array_map('ucwords', explode(' ', $value))));
    }
}
