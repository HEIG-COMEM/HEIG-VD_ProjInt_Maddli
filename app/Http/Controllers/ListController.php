<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class ListController extends Controller
{
    public function index(Request $request)
    {
        $hasJson = $request->has('json');
        $roles = [
            'ambassador' => !!$request->input('ambassadors', false),
            'mentor' => !!$request->input('mentors', false),
            'federation_contact' => !!$request->input('federation', false),
        ];

        // check if any of the roles are selected
        if (!$roles['ambassador'] && !$roles['mentor'] && !$roles['federation_contact']) {
            // If no roles are selected, return all users with any of the 3 roles

            $users = User::with('roles')
                ->whereHas('roles', function ($query) {
                    $query->whereIn('name', ['ambassador', 'mentor', 'federation_contact']);
                })
                ->get();
        } else {
            $users = User::with('roles')
                ->when($roles['ambassador'], function ($query) {
                    $query->orWhereHas('roles', function ($q) {
                        $q->where('name', 'ambassador');
                    });
                })
                ->when($roles['mentor'], function ($query) {
                    $query->orWhereHas('roles', function ($q) {
                        $q->where('name', 'mentor');
                    });
                })
                ->when($roles['federation_contact'], function ($query) {
                    $query->orWhereHas('roles', function ($q) {
                        $q->where('name', 'federation_contact');
                    });
                })
                ->get();
        }

        if ($hasJson) {
            // Handle the JSON request
            return response()->json([
                'params' => $request->all(),
                'users' => $users,
            ]);
        }
        // Handle the request and return a response
        return Inertia::render('club/Lists', [
            'users' => [], // Replace with actual data
        ]);
    }
}
