<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function users(Request $request)
    {
        $data = User::orderBy('name', 'asc')->with(['roles', 'licence', 'coaching.clubLeague.club', 'coaching.clubLeague.league', 'clubs'])->paginate(10);

        return Inertia::render('club/admin/Users')->with('data', $data);
    }

    public function clubs(Request $request)
    {
        $data = User::orderBy('name', 'asc')->with(['roles', 'licence', 'coaching.clubLeague.club', 'coaching.clubLeague.league', 'clubs'])->paginate(10);

        return Inertia::render('club/admin/Clubs')->with('data', $data);
    }
}
