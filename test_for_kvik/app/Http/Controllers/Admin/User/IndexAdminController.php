<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexAdminController extends Controller
{
    public function __invoke() {
        $users = User::where('premium', '1')->get();
        return view('admin.user.indexAdmin', compact('users'));
    }
}
