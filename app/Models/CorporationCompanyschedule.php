<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporationCompanyschedule extends Model
{
    use HasFactory;
    protected $connection = 'ats';
    protected $table = 'corporation_companyschedule';
    public $timestamps = false;
    public function corporationCompany()
    {
        return $this->belongsTo(CorporationCompany::class, 'company_id');
    }
}
