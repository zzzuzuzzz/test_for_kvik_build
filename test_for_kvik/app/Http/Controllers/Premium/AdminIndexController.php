<?php

namespace App\Http\Controllers\Premium;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        return view('premium.indexAdmin', compact('user'));
    }
}
