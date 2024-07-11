<?php

namespace App\Http\Controllers\API\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Task\StoreRequest;
use App\Http\Resources\Task\ShowAllTasks;
use App\Models\Task;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, $group_id) {
        $date = $request->validated();
        $task_id = Task::insertGetId([
            'title' => $date['title'],
            'description' => $date['description'],
            'status_id' => 1,
            'date_create' => $date['start'],
            'dead_line' => $date['end'],
            'group_id' => $group_id
        ]);
        return $task_id;
    }
}
