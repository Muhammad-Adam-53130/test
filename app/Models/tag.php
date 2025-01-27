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
}
