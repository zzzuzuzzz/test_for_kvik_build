<?php

namespace App\Http\Controllers\Premium;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class AdminCalendarController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        return view('premium.calendarAdmin', compact('user'));
    }
}
