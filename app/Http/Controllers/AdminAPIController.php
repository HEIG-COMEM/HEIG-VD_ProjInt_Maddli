<?php

namespace App\Http\Controllers;

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
}
