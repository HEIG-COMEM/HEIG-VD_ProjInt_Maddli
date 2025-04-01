<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\RelationType;

class ListController extends Controller
{
    public function indexOld(Request $request)
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

    public function index(Request $request)
    {
        $user = $request->user();
        $user_roles = $user->roles->pluck('name')->toArray();

        if (!count($user_roles)) {
            return Inertia::render('club/Lists', [
                'newUser' => true,
                'contacts' => [],
            ]);
        }

        $contacts = [
            'federations' => $this->loadUsersByRole('federation_contact'),
            'ambassadors' => in_array('prospect', $user_roles) ? $this->loadConversations($user, 'Ambassador / Prospect') : null,
            'prospects' => in_array('ambassador', $user_roles) ? $this->loadConversations($user, 'Ambassador / Prospect') : null,
            'mentors' => in_array('mentee', $user_roles) ? $this->loadConversations($user, 'Mentor / Mentee') : null,
            'mentees' => in_array('mentor', $user_roles) ? $this->loadConversations($user, 'Mentor / Mentee') : null,
        ];

        return Inertia::render('club/Lists', [
            'contacts' => $contacts,
        ]);
    }

    private function loadUsersByRole($role)
    {
        return User::whereHas('roles', function ($query) use ($role) {
            $query->where('name', $role);
        })
            ->with(['roles'])
            ->get();
    }

    private function loadConversations($user, $relationTypeName)
    {
        $relationTypeId = RelationType::where('name', $relationTypeName)->first()->id;

        $conversations = Conversation::where('relation_type_id', $relationTypeId)
            ->where(function ($query) use ($user) {
                $query->where('user_one_id', $user->id)
                    ->orWhere('user_two_id', $user->id);
            })
            ->with(['userOne.roles', 'userTwo.roles'])
            ->get();

        return $conversations->transform(function ($conversation) use ($user) {
            $conversation->user = $conversation->userOne->id === $user->id ? $conversation->userTwo : $conversation->userOne;
            unset($conversation->userOne, $conversation->userTwo);
            return $conversation;
        });
    }
}
