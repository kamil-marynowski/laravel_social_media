<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController
{
    /**
     * @return View
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();

        Post::create([
            'user_id' => $user->id,
            'text'    => $request->get('text'),
        ]);

        return redirect()->route('dashboard');
    }
}
