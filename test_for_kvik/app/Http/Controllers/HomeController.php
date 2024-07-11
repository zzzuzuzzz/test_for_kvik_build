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
            $group['group_name'] = Group::find($group->group_id)->group_name;
        }
        return view('home', compact('user', 'group_list'));
    }
}
