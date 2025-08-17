<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'position',
        'address',
        'city',
        'state',
        'zip_code',
        'country',
        'status',
        'notes',
        'assigned_to',
        'source',
        'last_contact',
        'next_follow_up'
    ];

    protected $casts = [
        'last_contact' => 'datetime',
        'next_follow_up' => 'datetime',
    ];

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}