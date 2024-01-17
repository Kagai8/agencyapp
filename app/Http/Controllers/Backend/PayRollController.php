<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
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

    public function EmployeeEditWorkDays($id){

        $employees = Employee::findOrFail($id);
        return view('admin.backend.employee.edit_work_days',compact('employees'));

    }

    public function EmployeeUpdateDays(Request $request){    

        $employee_id = $request->id;

        Employee::findOrFail($employee_id)->update([
        'days_worked' => $request->days_worked,
        
        

        

        'updated_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Employee Days Worked Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('generate-payroll')->with($notification);

    }

    
    public function generatePayslip($id)
    {
        // Fetch data for the receipt
            // Fetch data for the receipt
        $employee = Employee::findOrFail($id);

        // Generate PDF using the 'your-receipt-view' Blade view and the fetched data
        $pdf = PDF::loadView('admin.backend.payroll.employee_payslip', compact('employee'));

        // Return the PDF as a response
        return new Response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Receipt_PP' . $employee->id . '.pdf"',
        ]);

        

       
    }

}
