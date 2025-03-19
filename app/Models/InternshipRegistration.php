<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipRegistration extends Model
{
    protected $fillable = [
    'internship_id', 'name', 'age', 'university', 'nik',
    'email', 'phone', 'rekap_nilai', 'surat_persetujuan', 'cv'
    ];
}
