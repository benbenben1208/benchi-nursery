<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\CorporationJoboffer;
use App\Models\MessageRoom;
use App\Notifications\PasswordResetNotification;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $connection = 'fukuriku';
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth',
        'first_name',
        'last_name',
        'first_name_kana',
        'last_name_kana',
        'gender',
        'img_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //オーバーライドしてメールを送信
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }
    //複数DBの使用をまたぐと、BelongsToManyが使えないので, HasManyに変更。
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id');
    }
    //もし、いずれ複数DBでもbelongsToManyが使える方法がわかれば戻す。
    // public function favoriteJobs()
    // {
    //     return $this->belongsToMany(CorporationJoboffer::class , 'favorites', 'user_id','corporation_joboffer_id')->withTimestamps();
    // }
    public function offeredByJobs()
    {
        return $this->belongsToMany(CorporationJoboffer::class , 'offers')->withTimestamps()->withPivot('status', 'type');
    }
    public function applieJobs()
    {
        return $this->belongsToMany(CorporationJoboffer::class , 'applies')->withTimestamps()->withPivot('is_offer');
    }
    public function rooms()
    {
        return $this->hasMany(MessageRoom::class);
    }
    public function frikuFavorites()
    {
        return $this
            ->belongsToMany(FrikuJoboffer::class, 'friku_favorites')
            ->withPivot(['created_at', 'updated_at', 'id']);
    }
    public function corporationApplicant()
    {
        return $this->hasOne(CorporationApplicant::class, 'user_id');
    }
    public function frikuApplicant()
    {
        return $this->hasOne(FrikuApplicant::class, 'user_id');

    }



}
