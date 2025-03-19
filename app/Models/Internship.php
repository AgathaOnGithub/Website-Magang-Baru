<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'location', 'start_date', 'end_date'];

    // Relasi dengan applicants (anggap applicants adalah user yang mendaftar)
    public function applicants()
    {
        return $this->belongsToMany(User::class, 'internship_user', 'internship_id', 'user_id');
    }
}
