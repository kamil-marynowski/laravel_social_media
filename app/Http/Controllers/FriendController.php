<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Contracts\View\View;

class FriendController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        /** @var User $user */
        $user = auth()->user();

        $friends = Friend::with(['friendUser'])->where('user_id', $user->id)->get();

        return view('friends.index', ['friends' => $friends]);
    }
}
