<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MessageRoom;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Message extends Model
{
    use HasFactory;

    protected $connection = 'fukuriku';

    public function messageRoom() :BelongsTo
    {
        return $this->belongsTo(MessageRoom::class);
    }
}
