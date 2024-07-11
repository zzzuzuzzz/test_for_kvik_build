<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\ShowAllUsers;
use App\Models\Role;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke($group_id) {
        $users = Role::where('group_id', $group_id)->where('role', '!=', 'admin')->get();
        foreach ($users as $user) {
            $user->entered == '0' ? $user->entered = false : $user->entered = true;
            $user->user_id = User::find($user->user_id);
        }
        return ShowAllUsers::collection($users);
    }
}


