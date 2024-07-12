<?php

namespace App\Http\Controllers\Preview;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class PremiumBuyController extends Controller
{
    public function __invoke()
    {
        return view('preview.premiumBuy');
    }
}
