<?php

namespace App\Http\Controllers\Premium\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke($group_id) {
        $users = DB::table('roles')
            ->where('group_id', intval($group_id))
            ->join('users', 'roles.user_id', '=', 'users.id')
            ->paginate(10);
        return view('premium.user.index', compact('users'));
    }
}
