<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Club;

class AdminController extends Controller
{

    public function user(Request $request, $id)
    {
        $jsonResp = $request->has('json');

        $user = User::with(['roles', 'licence', 'coaching.clubLeague.club', 'coaching.clubLeague.league', 'clubs'])->find($id);

        if ($jsonResp) {
            return response()->json($user);
        }

        //TODO: Remove this debug code
        echo "<pre>";
        print_r($user);
        echo "</pre>";
        die();

        // return Inertia::render('club/admin/User', ['user' => $user]); //TODO: Implement the User component
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
}
