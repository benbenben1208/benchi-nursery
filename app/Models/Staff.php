<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $connection = 'fukuriku';
    protected $table = 'staffs';
    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'email',
        'is_superuser',
        'is_staff',
        'is_active',
        'date_joined'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function companies()
    {
        return $this->hasMany(FrikuCompany::class, 'user_id');
    }
}
