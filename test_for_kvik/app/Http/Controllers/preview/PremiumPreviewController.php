<?php

namespace App\Http\Controllers\preview;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PremiumPreviewController extends Controller
{
    public function __invoke()
    {
        return view('preview.premiumPreview');
    }
}
