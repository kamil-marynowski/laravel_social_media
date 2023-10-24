<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        if (auth()->user()->hasRole('admin')) {
            $users = User::all();

            return view('admin.users.index', ['users' => $users]);
        }

        $users = User::where('id', '!=', auth()->user()->id)->get();

        $users = $users->filter(function ($user) {
            if (!$user->hasRole('admin')) {
                return $user;
            }

            return null;
        });

        return view('user.users.index', ['users' => $users]);
    }
}
