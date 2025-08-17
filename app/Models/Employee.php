<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'city',
        'state',
        'zip_code',
        'country',
        'hire_date',
        'position',
        'department',
        'salary',
        'status',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relationship',
        'notes',
        'assigned_to'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'hire_date' => 'date',
        'salary' => 'decimal:2',
    ];

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}