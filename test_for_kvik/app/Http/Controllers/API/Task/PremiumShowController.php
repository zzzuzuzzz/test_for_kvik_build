<?php

namespace App\Http\Controllers\API\Task;

use App\Http\Controllers\Controller;
use App\Http\Resources\Task\PremiumShowAllTasks;
use App\Models\Status;
use App\Models\Task;

class PremiumShowController extends Controller
{
    public function __invoke($group_id) {
        $tasks = Task::where('group_id', $group_id)->get();
        $statuses = Status::where('group_id', null)->orWhere('group_id', $group_id)->get();
        $today = getdate()[0];
        foreach ($tasks as $task) {
            $task->dea_line = (new \DateTime($task->dead_line))->gettimestamp();
            if ($task->status_id == 1) {
                $task->status_id = $statuses[0];
                if ((new \DateTime($task->dead_line))->gettimestamp() < $today) {
                    $task->status_id->color = 'red';
                    $task->status_id->status_bad_name = 'Просрочено';
                }
            } else if ($task->status_id == 2) {
                $task->status_id = $statuses[1];
            } else {
                $task->status_id = $statuses->find($task->status_id);
                if ((new \DateTime($task->dead_line))->gettimestamp() < $today) {
                    $task->status_id->status_bad_name = 'Просрочено';
                }
            }
            $task->allDay = true;
            $task->statuses = $statuses;
        }
        return PremiumShowAllTasks::collection($tasks);
    }
}



