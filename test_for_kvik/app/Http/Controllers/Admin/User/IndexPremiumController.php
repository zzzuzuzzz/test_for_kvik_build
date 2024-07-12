<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexPremiumController extends Controller
{
    public function __invoke() {
        $users = User::where('premium', '1')->paginate(10);
        return view('admin.user.indexPremium', compact('users'));
    }
}
