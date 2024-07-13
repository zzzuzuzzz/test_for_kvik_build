<?php

namespace App\Http\Controllers\Premium;

use App\Http\Controllers\Controller;

class AdminIndexController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        return view('premium.adminIndex', compact('user'));
    }
}
