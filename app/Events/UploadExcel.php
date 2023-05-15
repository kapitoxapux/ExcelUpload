<?php

namespace App\Events;

use App\Models\ExcelDoc;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UploadExcel implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected ExcelDoc $model;

    public function __construct(ExcelDoc $model)
    {
        $this->model = $model;
    }

    public function broadcastWith():array
    {
        return [
            'model' => [
                'id' => $this->model->id,
                'name' => $this->model->name,
                'date' => $this->model->date,
            ]
        ];
    }

    public function broadcastOn(): Channel
    {
        return new Channel('upload-excel');
    }
}
