<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexAdminController extends Controller
{
    public function __invoke() {
        $users = User::where('role', 'admin')->paginate(10);
        return view('admin.user.indexAdmin', compact('users'));
    }
}
