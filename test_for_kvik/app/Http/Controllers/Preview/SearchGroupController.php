<?php

namespace App\Http\Controllers\Preview;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class SearchGroupController extends Controller
{
    public function __invoke()
    {
        $user=auth()->user();
        $group_list = Role::where('user_id', $user->id)->where('entered', 1)->get();

        return view('preview.searchGroup', compact('user', 'group_list'));
    }
}
