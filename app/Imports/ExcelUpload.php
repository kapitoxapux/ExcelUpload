<?php

namespace App\Imports;

use App\Models\ExcelDoc;
use App\Notifications\UploadData;
use Carbon\Carbon;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Auth\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Illuminate\Support\Facades\Redis;
use PhpOffice\PhpSpreadsheet\Shared\Date as PhpOffice;

class ExcelUpload implements ToModel, SkipsEmptyRows, WithHeadingRow, ShouldQueue, WithChunkReading, WithCalculatedFormulas
{
    use RegistersEventListeners, RemembersRowNumber;

    /**
     * @var User
     */
    private User $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    /**
     * @param array $row
     *
     * @return ExcelDoc
     */
    public function model(array $row): ExcelDoc
    {

        Redis::set('import',$this->getRowNumber()-1);

        $convertedDate = Carbon::instance(PhpOffice::excelToDateTimeObject(intval($row['date'])))->format('d.m.Y');

        $excelRow = new ExcelDoc([
            "name" => $row['name'],
            "date" => $convertedDate,
        ]);

//        $this->user->notify(new UploadData($excelRow));

        return $excelRow;
    }

//    public function batchSize(): int
//    {
//        return 100;
//    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
