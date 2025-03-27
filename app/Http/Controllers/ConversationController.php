<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ConversationController extends Controller
{
    public function index(Request $request)
    {
        $jsonResp = $request->has('json');
        $user = $request->user();

        $discutions = $user->conversations()->with(['userOne', 'userTwo', 'userOne.roles', 'userTwo.roles', 'relationType'])->get();

        $discutions->transform(function ($discution) use ($user) {
            if ($discution->userOne->id === $user->id) {
                $discution->user = $discution->userTwo;
            } else {
                $discution->user = $discution->userOne;
            }
            unset($discution->userOne);
            unset($discution->userTwo);
            return $discution;
        });

        if ($jsonResp) {
            return response()->json($discutions);
        } else {
            return Inertia::render('club/Discutions'); //TODO: Implement the Discutions component
        }
    }
}
