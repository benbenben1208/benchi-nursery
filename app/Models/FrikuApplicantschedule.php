<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrikuApplicantschedule extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function frikuJoboffer()
    {
        return $this->belongsTo(FrikuJoboffer::class);
    }
    public function frikuApplicant()
    {
        return $this->belongsTo(FrikuApplicant::class);
    }
}
