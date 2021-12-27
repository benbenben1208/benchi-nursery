<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MessageRoom;
use App\Models\CorporationCompany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class AuthUser extends Model
{
    use HasFactory;

    protected $connection = 'ats';
    protected $table = 'auth_user';
    public function rooms() :HasMany
    {
        return $this->hasMany(MessageRoom::class);
    }
    public function authUserCompanies() :HasMany
    {
        return $this->hasMany(CorporationCompany::class, 'user_id');
    }
}
