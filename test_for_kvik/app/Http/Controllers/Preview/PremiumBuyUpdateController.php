<?php

namespace App\Http\Controllers\Preview;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PremiumBuyUpdateController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user()->id;
        User::find($user)->update(['premium' => 1]);
        return redirect()->route('home');
    }
}
