<?php

namespace App\Models;

use App\Consts\JobConditionConsts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\FrikuCompany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Request;

class FrikuJoboffer extends Model
{
    use HasFactory;
    protected $connection = 'fukuriku';
    protected $appends = ['type_of_job'];
    public function getTypeOfJobAttribute()
    {
        $comp = FrikuCompany::findOrFail($this->company_id);
        return  $comp->is_pickup === true
            ? array_keys(JobConditionConsts::TYPE_OF_JOB, 'ピックアップ求人')
            : array_keys(JobConditionConsts::TYPE_OF_JOB, '注目企業求人');
    }
    public function frikuFavorited(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friku_favorites');
    }
    public function frikuCompany()
    {
        return $this->belongsTo(FrikuCompany::class, 'company_id');
    }
    public function frikuApplicantschedules()
    {
        return $this->hasMany(FrikuApplicantschedule::class);
    }
}
