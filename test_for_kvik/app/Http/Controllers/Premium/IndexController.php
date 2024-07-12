<?php

namespace App\Http\Controllers\Premium;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('premium.index');
    }
}
