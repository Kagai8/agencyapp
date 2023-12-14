<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Payslip;
use Carbon\Carbon;
use Image;
use Pdf;

class PayRollController extends Controller
{
    public function EmployeeGeneratePayroll(){

        $employees = Employee::latest()->get();
        return view('admin.backend.payroll.generate_payroll',compact('employees'));
    }


    public function EmployeeEditPayslip($id){

        $employees = Employee::findOrFail($id);
        return view('admin.backend.payroll.edit_payroll',compact('employees'));

    }

    
    public function generatePayslip(Request $request, $id)
    {
        // Retrieve employee details
        $employee = Employee::findOrFail($id);
        

        // Generate a unique filename based on First Name, Month, and Year
        $filename = $employee->employee_name . '_' . now()->format('F_Y') . '.pdf';

        // Pass data to the view to include in the PDF
        $data = ['employee' => $employee];

        // Generate PDF
        $pdf = PDF::loadView('admin.backend.payroll.employee_payslip', $data);

        // Save PDF to storage with the unique filename
        $pdfPath = 'payslips/' . $filename;
        $pdf->save(public_path($pdfPath));

        // Save PDF path and missed days to payslips table
        Payslip::create([
            'employee_id' => $id,
            'file_path' => $pdfPath,
            
        ]);

        // Open the PDF in a new tab
        return $pdf->stream($filename);
    }

}
