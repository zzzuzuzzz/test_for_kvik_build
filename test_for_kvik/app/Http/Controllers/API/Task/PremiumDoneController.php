<?php

namespace App\Http\Controllers\API\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Task\StatusRequest;
use App\Models\Task;

class PremiumDoneController extends Controller
{
    public function __invoke(StatusRequest $request, $task_id) {
        $date = $request->validated();
        Task::find($task_id)->update(['status_id' => $date['statusSelect']]);
        return redirect()->back();
    }
}
