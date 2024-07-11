<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Role;

class DeleteController extends Controller
{
    public function __invoke($user_id) {
        Role::find($user_id)->delete();
    }
}
