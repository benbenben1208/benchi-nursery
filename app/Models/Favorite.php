<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Favorite extends Model
{
    use HasFactory;

    protected $table = 'favorites';
    protected $connection = 'fukuriku';
    protected $fillable = ['user_id', 'corporation_joboffer_id'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function users() : belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function joboffers() : belongsTo
    {
        return $this->belongsTo(CorporationJoboffer::class);
    }
}
