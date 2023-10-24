<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $posts = Post::with(['user'])
            ->select('user_id', 'text', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();


        if (auth()->user()->hasRole('user')) {
            return view('user.dashboard.dashboard', ['posts' => $posts]);
        }

        return view('user.dashboard.dashboard', ['posts' => $posts]);
    }
}
