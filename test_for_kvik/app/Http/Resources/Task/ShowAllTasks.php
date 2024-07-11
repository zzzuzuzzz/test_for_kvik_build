<?php

namespace App\Http\Resources\Task;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowAllTasks extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'backgroundColor' => $this->status_id,
            'borderColor' => $this->status_id,
            'start' => $this->date_create,
            'end' => $this->dead_line,
            'allDay' => $this->allDay,
        ];
    }
}
