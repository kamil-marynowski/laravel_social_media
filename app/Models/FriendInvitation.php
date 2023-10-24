<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendInvitation extends Model
{
    use HasFactory;

    protected $table = 'friend_invitations';

    protected $fillable = [
        'user_id',
        'friend_user_id',
        'status_id',
    ];

    public const STATUS_PENDING  = 0;
    public const STATUS_ACCEPTED = 1;
    public const STATUS_REJECTED = 2;
}
