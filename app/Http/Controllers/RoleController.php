<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Returns roles list
     *
     * @return View
     */
    public function index(): View
    {
        $roles = Role::all();

        return view('admin.roles.index', ['roles' => $roles]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.roles.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Role::create($request->all());

        return redirect()->route('roles.index')->with('success', 'Role created!');
    }
}
