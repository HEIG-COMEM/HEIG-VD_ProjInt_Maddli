<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(Request $request, int $id)
    {
        $user = User::whereId($id)->with(['licence', 'roles', 'coaching.clubLeague.club', 'coaching.clubLeague.league'])->firstOrFail();

        return response()->json($user);
    }
}
