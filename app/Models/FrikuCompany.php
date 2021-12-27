<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Staff;
class FrikuCompany extends Model
{
    use HasFactory;
    protected $connection = 'fukuriku';
    protected $guarded = [
        'id'
    ];
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'user_id');
    }
    public function frikuJoboffers()
    {
        return $this->hasMany(FrikuJoboffer::class, 'company_id');
    }
    public function featuredCompanyArticle()
    {
        return $this->hasOne(FeaturedCompanyArticle::class);
    }
}
