<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function feeds()
    {
        return $this->belongsToMany(Feed::class)->withTimestamps()->withPivot('isActive');
    }

    // Mutator for the 'title' attribute
    public function setNameAttribute($value)
    {
        // Normalize the title by making it lowercase first, then apply the formatting
        $value = strtolower($value);  // Convert the entire string to lowercase

        // Convert each word to lowercase and then make the first letter of each word Uppercase
        $this->attributes['name'] = ucfirst(implode(' ', array_map('ucwords', explode(' ', $value))));
    }
}
