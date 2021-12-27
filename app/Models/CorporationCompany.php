<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AuthUser;
use App\Models\CorporationJoboffer;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class CorporationCompany extends Model
{
    use HasFactory;


    protected $connection = 'ats';
    protected $table = 'corporation_company';
    public function authUser() :BelongsTo
    {
        return $this->belongsTo(AuthUser::class, 'user_id');
    }
    public function joboffers() :HasMany
    {
        return $this->hasMany(CorporationJoboffer::class, 'company_id');
    }
    public function corporationCompanyschedules()
    {
        return $this->hasMany(CorporationCompanyschedule::class, 'company_id');
    }
}
