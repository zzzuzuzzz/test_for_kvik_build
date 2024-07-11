<?php

namespace App\Http\Controllers\API\Task;

use App\Http\Controllers\Controller;
use App\Http\Resources\Task\ShowAllTasks;
use App\Models\Status;
use App\Models\Task;

class ShowController extends Controller
{
    public function __invoke($group_id) {
        $tasks = Task::where('group_id', $group_id)->get();
        $statuses = Status::where('group_id', null)->get();
        $today = getdate()[0];
        foreach ($tasks as $task) {
            $task->dea_line = (new \DateTime($task->dead_line))->gettimestamp();
            if ($task->status_id == 1) {
                $task->status_id = $statuses[0]->color;
                if ((new \DateTime($task->dead_line))->gettimestamp() < $today) {
                    $task->status_id = 'red';
                }
            } else {
                $task->status_id = $statuses[1]->color;
            }
            $task->allDay = true;
        }
        return ShowAllTasks::collection($tasks);
    }
}


