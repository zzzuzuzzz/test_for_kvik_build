<?php

namespace App\Http\Controllers\Premium;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        return view('premium.index', compact('user'));
    }
}
