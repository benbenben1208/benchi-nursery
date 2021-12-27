<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CorporationJoboffer;
use App\Models\AuthUser;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class MessageRoom extends Model
{
    use HasFactory;

    protected $connection = 'fukuriku';

    public function user() :belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function companyUser() :belongsTo
    {
        return $this->belongsTo(AuthUser::class);
    }
    public function job() :BelongsTo
    {
        return $this->belongsTo(CorporationJoboffer::class);
    }
    public function messages() :HasMany
    {
        return $this->hasMany(Message::class);
    }
}
