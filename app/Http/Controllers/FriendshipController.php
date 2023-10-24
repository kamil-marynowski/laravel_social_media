<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Friendship;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FriendshipController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        Friendship::create($request->all());

        return response()->json('OK');
    }

    public function update(Request $request, Friendship $friendship)
    {
        $friendship->update($request->all());

        return response()->json('OK');
    }

    public function destroy(Friendship $friendship)
    {
        $friendship->delete();

        return response()->json('OK');
    }
}
