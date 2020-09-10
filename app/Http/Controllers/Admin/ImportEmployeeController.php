<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportEmployeeRequest;
use App\Imports\EmployeeImport;
use App\Model\Employee;
use Maatwebsite\Excel\Facades\Excel;

class ImportEmployeeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  ImportEmployeeRequest  $request
     * @param  int  $bankId
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ImportEmployeeRequest $request, Employee $employee)
    {
        Excel::import(new EmployeeImport($employee->id), $request->file('employees'));

        return response()->json([
            'message' => 'Successfully imported logs'
        ]);
    }
}
