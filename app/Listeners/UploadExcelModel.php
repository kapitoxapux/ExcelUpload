<?php

namespace App\Listeners;

use App\Events\UploadExcel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UploadExcelModel implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * @param UploadExcel $event
     */
    public function handle(UploadExcel $event): void
    {
        Log::debug('Event listener: ',[$event]);
    }
}
