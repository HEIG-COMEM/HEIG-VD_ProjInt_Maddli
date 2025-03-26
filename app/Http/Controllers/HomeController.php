<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->user()->id;
        $user = User::where('id', $id)->with(['roles', 'licence', 'coaching.clubLeague.club', 'coaching.clubLeague.league', 'clubs'])->first();
        return Inertia::render('club/Home')->with('user', $user);
    }
}
