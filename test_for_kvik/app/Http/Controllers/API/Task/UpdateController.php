<?php

namespace App\Http\Controllers\API\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Task\StoreRequest;
use App\Http\Requests\API\Task\UpdateRequest;
use App\Http\Resources\Task\ShowAllTasks;
use App\Models\Task;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $task_id) {
        $date = $request->validated();
        if (!isset($date['end'])) {
          $date['end'] = $date['start'];
        }
        Task::find($task_id)->update([
            'date_create' => $date['start'],
            'dead_line' => $date['end']
        ]);
    }
}
