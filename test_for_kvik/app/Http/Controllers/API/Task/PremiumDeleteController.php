<?php

namespace App\Http\Controllers\API\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;

class PremiumDeleteController extends Controller
{
    public function __invoke($task_id) {
        Task::find($task_id)->delete();
        return redirect()->back();
    }
}
