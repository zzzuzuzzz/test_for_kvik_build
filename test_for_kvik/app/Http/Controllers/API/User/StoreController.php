<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Role;

class StoreController extends Controller
{
    public function __invoke($user_id) {
        Role::find($user_id)->update(['entered' => '1']);
    }
}
