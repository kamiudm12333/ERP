<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

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
        'notes',
        'status',
        'assigned_to',
        'source',
        'last_contact_date',
        'next_follow_up'
    ];

    protected $casts = [
        'last_contact_date' => 'date',
        'next_follow_up' => 'date',
    ];

    public function assignedEmployee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}