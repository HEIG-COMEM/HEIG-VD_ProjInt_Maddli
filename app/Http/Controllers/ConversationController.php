<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Conversation;

class ConversationController extends Controller
{
    public function index(Request $request)
    {
        $jsonResp = $request->has('json');
        $user = $request->user();

        $conversations = $user->conversations()->with(['userOne', 'userTwo'])->get();

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
        }

        return "WIP";
        //return Inertia::render('club/Conversations'); //TODO: Implement the conversations component
    }

    public function show(Request $request, int $id)
    {
        $jsonResp = $request->has('json');
        $user = $request->user();

        $conversation = Conversation::where(function ($query) use ($user, $id) {
            $query->where('id', $id)
                ->where(function ($q) use ($user) {
                    $q->where('user_one_id', $user->id)
                        ->orWhere('user_two_id', $user->id);
                });
        })->with(['userOne', 'userTwo', 'userOne.roles', 'userTwo.roles', 'relationType', 'messages'])->firstOrFail();

        if ($conversation->userOne->id === $user->id) {
            $conversation->user = $conversation->userTwo;
        } else {
            $conversation->user = $conversation->userOne;
        }
        unset($conversation->userOne);
        unset($conversation->userTwo);

        if ($jsonResp) {
            return response()->json($conversation);
        }

        return Inertia::render('club/Conversation')->with('conversation', $conversation);
    }
}
