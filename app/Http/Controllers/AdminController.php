<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Club;
use App\Models\ClubLeague;
use App\Models\Coaching;

class AdminController extends Controller
{

    public function user(Request $request, $id)
    {
        $jsonResp = $request->has('json');

        $user = User::with(['roles', 'licence', 'coaching.clubLeague.club', 'coaching.clubLeague.league', 'clubs'])->find($id);

        if ($jsonResp) {
            return response()->json($user);
        }

        abort(404);
    }

    public function users(Request $request)
    {
        $query = User::orderBy('name', 'asc')
            ->with(['roles', 'licence', 'coaching.clubLeague.club', 'coaching.clubLeague.league', 'clubs']);

        if ($request->has('name')) {
            $name = $request->query('name');
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($name) . '%']);
        }

        $data = $query->paginate(10)->withQueryString();

        return Inertia::render('club/admin/Users')->with(['data' => $data, 'filters' => $request->all()]);
    }

    public function userLicence(Request $request, int $id)
    {
        $request->validate([
            'licence' => 'required',
        ]);

        $licence = $request->input('licence');
        $user = User::find($id);
        if (!$user) abort(404);

        if ($licence < 0) {
            $user->licence()->dissociate();
            $user->save();
        } else {
            $request->validate([
                'licence' => 'required|exists:licences,id',
            ]);
            $user->licence()->associate($licence);
            $user->save();
        }
    }

    public function clubs(Request $request)
    {
        $query = Club::orderBy('name', 'asc')
            ->with(['leagues', 'managers']);


        if ($request->has('name')) {
            $name = $request->query('name');
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($name) . '%']);
        }

        $data = $query->paginate(10)->withQueryString();

        // loop through the clubs and append the coaches
        foreach ($data as $club) {
            $club->coaches = $club->coaches();
        }

        return Inertia::render('club/admin/Clubs')->with(['data' => $data, 'filters' => $request->all()]);
    }

    public function club(Request $request, int $id)
    {
        $club = Club::with(['leagues', 'managers'])->find($id);

        if (!$club) abort(404);

        $club->coaches = $club->coaches();

        $jsonResp = $request->has('json');

        if ($jsonResp) {
            return response()->json(['club' => $club]);
        }
    }

    public function deleteClubCoach(Request $request, int $clubId, int $userId)
    {
        $club = Club::find($clubId);
        if (!$club) abort(404);
        $user = User::find($userId);
        if (!$user) abort(404);

        // Get all coaching records for the user
        $coachingRecords = Coaching::where('user_id', $userId)
            ->whereHas('clubLeague', function ($query) use ($clubId) {
                $query->where('club_id', $clubId);
            })
            ->get();
        // Loop through each coaching record and delete it
        foreach ($coachingRecords as $coaching) {
            $coaching->delete();
        }

        return redirect()->back()->with('success', 'Coach removed from club successfully.');
    }

    public function addClubCoach(Request $request, int $clubId, int $userId)
    {
        $request->validate([
            'leagueId' => 'required|exists:leagues,id',
        ]);

        $club = Club::find($clubId);
        if (!$club) abort(404);
        $user = User::find($userId);
        if (!$user) abort(404);

        $clubLeague = ClubLeague::where('club_id', $clubId)
            ->where('league_id', $request->input('leagueId'))
            ->first();

        if (!$clubLeague) {
            return redirect()->back()->withErrors(['message' => 'Club league not found.']);
        }

        // Check if the user is already a coach in the club
        $existingCoaching = Coaching::where('user_id', $userId)
            ->where('club_league_id', $clubLeague->id)
            ->first();

        if ($existingCoaching) {
            return redirect()->back()->withErrors(['message' => 'User is already a coach in this club.']);
        }

        Coaching::create([
            'user_id' => $userId,
            'club_league_id' => $clubLeague->id,
        ]);

        return redirect()->back()->with('success', 'Coach added to club successfully.');
    }

    public function deleteClubManager(Request $request, int $clubId, int $userId)
    {
        $club = Club::find($clubId);
        if (!$club) abort(404);
        $user = User::find($userId);
        if (!$user) abort(404);

        $club->managers()->detach($userId);

        return redirect()->back()->with('success', 'Manager removed from club successfully.');
    }

    public function addClubManager(Request $request, int $clubId, int $userId)
    {
        $club = Club::find($clubId);
        if (!$club) abort(404);
        $user = User::find($userId);
        if (!$user) abort(404);

        // Check if the user is already a manager in the club
        if ($club->managers()->where('user_id', $userId)->exists()) {
            return redirect()->back()->withErrors(['message' => 'User is already a manager in this club.']);
        }

        $club->managers()->attach($userId);

        return redirect()->back()->with('success', 'Manager added to club successfully.');
    }

    public function deleteLeagueClub(Request $request, int $leagueId, int $clubId)
    {
        $club = Club::find($clubId);
        if (!$club) abort(404);

        $clubLeague = ClubLeague::where('club_id', $clubId)
            ->where('league_id', $leagueId)
            ->first();

        if (!$clubLeague) {
            return redirect()->back()->withErrors(['message' => 'Club league not found.']);
        }

        $clubLeague->delete();

        return redirect()->back()->with('success', 'Club removed from league successfully.');
    }

    public function addLeagueClub(Request $request, int $clubId, int $leagueId)
    {
        $club = Club::find($clubId);
        if (!$club) abort(404);

        $clubLeague = ClubLeague::where('club_id', $clubId)
            ->where('league_id', $leagueId)
            ->first();

        if ($clubLeague) {
            return redirect()->back()->withErrors(['message' => 'Club is already in this league.']);
        }

        ClubLeague::create([
            'club_id' => $clubId,
            'league_id' => $leagueId,
        ]);

        return redirect()->back()->with('success', 'Club added to league successfully.');
    }
}
