<?php

declare(strict_types=1);

namespace App\Actions\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FriendInvitation;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class SendFriendInvitation extends Controller
{
    use AsAction;

    public function handle(Request $request): JsonResponse
    {
        $friendUserId = (int)$request->get('friend_user_id');

        /** @var User $authUser */
        $authUser = auth()->user();

        $friendInvitation = FriendInvitation::select('id')
            ->where('user_id', $authUser->id)
            ->where('friend_user_id', $friendUserId)
            ->fisrt();

        if ($friendInvitation) {
            return response()->json('Exists');
        }

        FriendInvitation::create([
            'user_id' => $authUser->id,
            'friend_user_id' => $friendUserId,
            'status' => FriendInvitation::STATUS_PENDING,
        ]);

        return response()->json('OK');
    }
}
