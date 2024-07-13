<?php

namespace App\Http\Controllers\Premium\User;

use App\Http\Controllers\Controller;
use App\Models\Role;

class DeleteController extends Controller
{
    public function __invoke($user_id, $group_id) {
        Role::where('user_id', $user_id)->where('group_id', $group_id)->delete();
        return redirect()->back();
    }
}
