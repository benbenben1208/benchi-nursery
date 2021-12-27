<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrikuApplicant extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function frikuApplicantSchedules()
    {
        return $this->hasMany(FrikuApplicantSchedule::class, 'friku_applicant_id');
    }
}
