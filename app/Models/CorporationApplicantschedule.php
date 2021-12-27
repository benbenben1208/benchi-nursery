<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CorporationApplicant;
class CorporationApplicantschedule extends Model
{
    use HasFactory;

    protected $connection = 'ats';
    protected $table = 'corporation_applicantschedule';
    public $timestamps = false;
    protected $guarded = [
        'id'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function corporationApplicant()
    {
        return $this->belongsTo(CorporationApplicant::class, 'applicant_id');
    }
    public function corporationJoboffer()
    {
        return $this->belongsTo(CorporationJoboffer::class, 'job_offer_id');
    }
}
