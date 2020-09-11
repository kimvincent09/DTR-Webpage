<?php

namespace App\Imports;

use App\Model\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Throwable;

class EmployeeImport implements ToModel, SkipsOnError, WithHeadingRow, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Employee([
            'name' => $row['name'],
            'time' => $row['time'],
            'date' => $row['date']

        ]);
    }
    public function onError(Throwable $e)
    {
        logger('[EMPLOYEE IMPORT]' . $e->getMessage());
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}

