<?php

namespace App\Http\Controllers\preview;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Role;
use Illuminate\Http\Request;

class CreateGroupStoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $date = $request->validate([
            'group_name' => 'required|string'
        ]);
        $group = Group::firstOrCreate([
            'group_name' => $date['group_name'],
            'premium' => $user->premium
            ]);
        Role::firstOrCreate([
            'user_id' => $user->id,
            'group_id' => $group->id,
            'role' => 'admin',
            'entered' => 1
        ]);

        return redirect()->route('home');
    }
}
