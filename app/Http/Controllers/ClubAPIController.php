<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Nation;
use App\Models\League;
use App\Models\Club;
use App\Models\User;

class ClubAPIController extends Controller
{
    public function countries()
    {
        $countries = Nation::all();
        return response()->json(['countries' => $countries]);
    }

    public function clubs(Request $request, string $countryCode)
    {
        // find all leagues in the country
        $leagues = League::whereHas('nation', function ($query) use ($countryCode) {
            $query->where('code', $countryCode);
        })->with('clubs')->distinct()->get();

        // find all clubs in the leagues
        $clubs = [];
        foreach ($leagues as $league) {
            $clubs = array_merge($clubs, $league->clubs->map(function ($club) {
                return [
                    'id' => $club->id,
                    'name' => $club->name,
                ];
            })->toArray());
        }

        usort($clubs, function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });
        $clubs = array_unique($clubs, SORT_REGULAR);

        return response()->json([
            'clubs' => $clubs,
        ]);
    }

    public function findRepresentative(Request $request, string $role = 'ambassador')
    {
        $request->validate([
            'countryCode' => 'nullable|string|exists:nations,code',
            'clubId' => 'nullable|integer|exists:clubs,id',
            'role' => 'nullable|string|exists:roles,name',
        ]);

        $countryCode = $request->input('countryCode');
        $clubId = $request->input('clubId');
        $role = $request->input('role', $role);

        $club = null;
        $representative = null;

        if ($clubId) {
            $club = Club::find($clubId);
            $possibleRep = $club->coaches();

            $possibleRep = array_map(function ($user) {
                return $user->id;
            }, $possibleRep);

            $representative = User::whereIn('id', $possibleRep)
                ->with('roles')
                ->whereHas('roles', function ($query) use ($role) {
                    $query->where('name', $role);
                })
                ->inRandomOrder()
                ->first();

            if ($representative) {
                // If a representative is found, return the response
                return response()->json([
                    'representative' => $representative,
                    'matchBy' => 'club',
                ]);
            }
        }

        if ($countryCode) {
            // find all clubs in leagues in the country
            $clubs = Club::whereHas('leagues', function ($query) use ($countryCode) {
                $query->whereHas('nation', function ($query) use ($countryCode) {
                    $query->where('code', $countryCode);
                });
            })->get();

            // find all coaches in the clubs
            $possibleRep = [];
            foreach ($clubs as $club) {
                $possibleRep = array_merge($possibleRep, $club->coaches());
            }
            $possibleRep = array_map(function ($user) {
                return $user->id;
            }, $possibleRep);

            // find a random representative
            $representative = User::whereIn('id', $possibleRep)
                ->with('roles')
                ->whereHas('roles', function ($query) use ($role) {
                    $query->where('name', $role);
                })
                ->inRandomOrder()
                ->first();

            if ($representative) {
                // If a representative is found, return the response
                return response()->json([
                    'representative' => $representative,
                    'matchBy' => 'country',
                ]);
            }
        }

        // If no representative is found, find a random user with the same role
        $representative = User::with('roles')->whereHas('roles', function ($query) use ($role) {
            $query->where('name', $role);
        })
            ->inRandomOrder()
            ->first();
        if ($representative) {
            return response()->json([
                'representative' => $representative,
                'matchBy' => 'random',
            ]);
        }

        // If no representative is found, return an error response
        return response()->json([
            'error' => 'No representative found',
        ], 404);
    }
}
