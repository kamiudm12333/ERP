<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'city',
        'state',
        'zip_code',
        'guardian_name',
        'guardian_phone',
        'guardian_email',
        'student_class_id',
        'student_year_id',
        'admission_date',
        'status',
        'fees_paid',
        'fees_pending',
        'notes',
        'profile_photo'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'admission_date' => 'date',
        'fees_paid' => 'decimal:2',
        'fees_pending' => 'decimal:2'
    ];

    // Relationships
    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class);
    }

    public function studentYear()
    {
        return $this->belongsTo(StudentYear::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    // Accessors
    public function getFullAddressAttribute()
    {
        return trim($this->address . ', ' . $this->city . ', ' . $this->state . ' ' . $this->zip_code);
    }

    public function getTotalFeesAttribute()
    {
        return $this->fees_paid + $this->fees_pending;
    }

    public function getAgeAttribute()
    {
        return $this->date_of_birth ? $this->date_of_birth->age : null;
    }
}
