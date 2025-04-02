<?php

namespace App\Http\Controllers;

use App\Models\ClubLeague;
use App\Models\League;
use Illuminate\Http\Request;
use App\Models\User;

class AdminAPIController extends Controller
{
    public function availableCoaches(Request $request)
    {
        // get all user with a license
        $coaches = User::where('licence_id', '!=', null)
            ->where('id', '!=', $request->user()->id)
            ->get(['id', 'name']);

        return response()->json([
            'coaches' => $coaches,
        ]);
    }

    public function availableManagers(Request $request)
    {
        $managers = User::get(['id', 'name']);
        return response()->json([
            'managers' => $managers,
        ]);
    }

    public function availableLeagues(Request $request, int $id)
    {
        $clubLeagues = ClubLeague::where('club_id', $id)
            ->with('league')
            ->get();

        $leagues = [];
        foreach ($clubLeagues as $clubLeague) {
            $leagues[] = [
                'id' => $clubLeague->league->id,
                'name' => $clubLeague->league->name,
            ];
        }

        return response()->json([
            'leagues' => $leagues,
        ]);
    }

    public function leagues(Request $request)
    {
        $leagues = League::all(['id', 'name']);

        return response()->json([
            'leagues' => $leagues,
        ]);
    }
}
