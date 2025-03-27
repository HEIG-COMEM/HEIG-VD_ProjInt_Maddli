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

        $conversations = $user->conversations()->with(['userOne', 'userTwo', 'userOne.roles', 'userTwo.roles', 'relationType'])->get();

        $conversations->transform(function ($conversation) use ($user) {
            if ($conversation->userOne->id === $user->id) {
                $conversation->user = $conversation->userTwo;
            } else {
                $conversation->user = $conversation->userOne;
            }
            unset($conversation->userOne);
            unset($conversation->userTwo);
            return $conversation;
        });

        if ($jsonResp) {
            return response()->json($conversations);
        } else {
            return Inertia::render('club/Conversation'); //TODO: Implement the conversation component
        }
    }
}
