<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Conversation;
use App\Models\Message;

class ConversationController extends Controller
{
    public function index(Request $request)
    {
        $jsonResp = $request->has('json');
        if (!$jsonResp) return redirect()->route('club.lists');

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

        // for each conversation, count the unread messages from the user
        $conversations->transform(function ($conversation) use ($user) {
            $conversation->unreadMessagesCount = $conversation->messages()
                ->where('is_read', false)
                ->where('user_id', '!=', $user->id)
                ->count();
            return $conversation;
        });

        return response()->json($conversations);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $user = $request->user();
        $conversation = Conversation::where(function ($query) use ($user, $request) {
            $query->where('user_one_id', $user->id)
                ->where('user_two_id', $request->input('user_id'));
        })->orWhere(function ($query) use ($user, $request) {
            $query->where('user_one_id', $request->input('user_id'))
                ->where('user_two_id', $user->id);
        })->first();

        if (!$conversation) {
            $conversation = new Conversation([
                'user_one_id' => $user->id,
                'user_two_id' => $request->input('user_id'),
            ]);
            $conversation->save();
        }

        return redirect()->route('club.conversation', ['id' => $conversation->id]);
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

        // mark all message from the other user as read
        $conversation->messages()->where('user_id', '!=', $user->id)->update(['is_read' => true]);

        return Inertia::render('club/Conversation')->with('conversation', $conversation);
    }

    public function storeMessage(Request $request, int $id)
    {
        $request->validate([
            'newMessage' => 'required|string',
        ]);

        $user = $request->user();
        $conversation = Conversation::where(function ($query) use ($user, $id) {
            $query->where('id', $id)
                ->where(function ($q) use ($user) {
                    $q->where('user_one_id', $user->id)
                        ->orWhere('user_two_id', $user->id);
                });
        })->firstOrFail();
        $message = new Message([
            'user_id' => $user->id,
            'conversation_id' => $conversation->id,
            'content' => $request->input('newMessage'),
        ]);
        $message->save();
    }
}
