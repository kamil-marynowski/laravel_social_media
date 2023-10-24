<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    use HasFactory;

    protected $table = 'friendships';

    protected $fillable = [
        'friend_one_id',
        'friend_two_id',
        'status_id'
    ];

    public const STATUS_PENDING   = 0;
    public const STATUS_ACCEPTED  = 1;
    public const STATUS_REJECTED  = 2;
}
