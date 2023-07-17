<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasFactory;

    protected $table = 'staff';

    protected $fillable = ['name', 'short_code', 'email', 'dob', 'address', 'password', 'status', 'dept_id'];

    // Establishing belongsTo() relationship with the Department model
    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }
}
