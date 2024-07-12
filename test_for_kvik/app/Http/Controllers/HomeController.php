<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $group_list = Role::where('user_id', $user->id)->where('entered', 1)->get();
        foreach ($group_list as $group) {
            $group_from_db = Group::find($group->group_id);
            $group['group_name'] = $group_from_db->group_name;
            $group['premium'] = $group_from_db->premium;
            setcookie('group_' . $group->group_id . '[1]', $group_from_db->id);
            setcookie('group_' . $group->group_id . '[2]', $group_from_db->group_name);
            setcookie('group_' . $group->group_id . '[3]', $group['role']);
        }
        $year = time() + 3600 * 24 * 31 * 12;
        setcookie('user_name', $user->name, $year);
        setcookie('user_email', $user->email, $year);
        return view('home', compact('user', 'group_list'));
    }
}
