<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @return View
     */
    public function edit(): View
    {
        /** @var int $userId */
        $userId = auth()->user()->id;

        $user = User::with(['profile'])
            ->where('id', $userId)
            ->first();

        return view('user.profile.edit', ['user' => $user]);
    }

    public function update(Request $request): RedirectResponse
    {
        /** @var int $userId */
        $userId = auth()->user()->id;

        $user = Use
    }
}
