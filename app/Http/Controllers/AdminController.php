<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function users(Request $request)
    {
        $user = $request->user();
        $roles = $user->roles()->get()->pluck('name')->toArray();

        $data = null;

        if (in_array('uefa_manager', $roles)) {
            $data = User::orderBy('name', 'asc')->paginate(20);
        }

        return Inertia::render('club/admin/Users')->with('data', $data);
    }
}
