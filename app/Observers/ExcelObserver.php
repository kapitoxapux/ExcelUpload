<?php

namespace App\Observers;

use App\Events\UploadExcel;
use App\Models\ExcelDoc;

class ExcelObserver
{

    /**
     * Handle the ExcelDoc "created" event.
     * @param ExcelDoc $excelDoc
     */
    public function created(ExcelDoc $excelDoc): void
    {
        event(new UploadExcel($excelDoc));
    }

    /**
     * Handle the ExcelDoc "updated" event.
     * @param ExcelDoc $excelDoc
     */
    public function updated(ExcelDoc $excelDoc): void
    {
        //
    }

    /**
     * Handle the ExcelDoc "deleted" event.
     * @param ExcelDoc $excelDoc
     */
    public function deleted(ExcelDoc $excelDoc): void
    {
        //
    }

    /**
     * Handle the ExcelDoc "restored" event.
     * @param ExcelDoc $excelDoc
     */
    public function restored(ExcelDoc $excelDoc): void
    {
        //
    }

    /**
     * Handle the ExcelDoc "force deleted" event.
     * @param ExcelDoc $excelDoc
     */
    public function forceDeleted(ExcelDoc $excelDoc): void
    {
        //
    }
}
