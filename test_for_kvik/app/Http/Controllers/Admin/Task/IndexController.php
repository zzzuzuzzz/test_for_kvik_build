<?php

namespace App\Http\Controllers\Admin\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;

class IndexController extends Controller
{
    public function __invoke() {
        $tasks = Task::paginate(10);
        return view('admin.task.index', compact('tasks'));
    }
}
