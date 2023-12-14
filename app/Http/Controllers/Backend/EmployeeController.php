<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;
use Image;

class EmployeeController extends Controller
{
    public function EmployeeAdd(){
        
        return view('admin.backend.employee.add_employee');
    }


    public function EmployeeManage(){

        $employees = Employee::latest()->get();
        return view('admin.backend.employee.view_employee',compact('employees'));
    }


    public function EmployeeStore(Request $request){    

        $image = $request->file('employee_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/employee/'.$name_gen);
        $save_url = 'upload/employee/'.$name_gen;

        $employee_id = Employee::insertGetId([
        'employee_name' => $request->employee_name,
        'employee_email' => $request->employee_email,
        'employee_phone_no' => $request->employee_phone_no,
        'date_joined' => $request->date_joined,
        'employee_kra_pin' => $request->employee_kra_pin,
        'nhif_no' => $request->nhif_no,
        'employee_nssf_no' => $request->employee_nssf_no,
        'employee_designation' => $request->employee_designation,
        'employee_gender' => $request->employee_gender,
        'employee_national_id' => $request->employee_national_id,

        'employee_bank_name' => $request->employee_bank_name,
        'employee_bank_branch' => $request->employee_bank_branch,
        'employee_bank_acc_no' => $request->employee_bank_acc_no,

        'employee_basic_salary' => $request->employee_basic_salary,
        'employee_housing_allowance' => $request->employee_housing_allowance,
        'employee_comission' => $request->employee_comission,
        'other_allowances' => $request->other_allowances,
        'employee_bonuses' => $request->employee_bonuses,

        'employee_paye' => $request->employee_paye,
        'employee_nssf' => $request->employee_nssf,
        'employee_nhif' => $request->employee_nhif,
        'employee_cotu' => $request->employee_cotu,
        'employee_loans' => $request->employee_loans,
        

        'employee_image' => $save_url,

        'created_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Employee Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-employee')->with($notification);

    }

    public function EmployeeUpdate(Request $request){    

        $employee_id = $request->id;

        Employee::findOrFail($employee_id)->update([
        'employee_name' => $request->employee_name,
        'employee_email' => $request->employee_email,
        'employee_phone_no' => $request->employee_phone_no,
        'date_joined' => $request->date_joined,
        'employee_kra_pin' => $request->employee_kra_pin,
        'nhif_no' => $request->nhif_no,
        'employee_nssf_no' => $request->employee_nssf_no,
        'employee_designation' => $request->employee_designation,
        'employee_gender' => $request->employee_gender,
        'employee_national_id' => $request->employee_national_id,

        'employee_bank_name' => $request->employee_bank_name,
        'employee_bank_branch' => $request->employee_bank_branch,
        'employee_bank_acc_no' => $request->employee_bank_acc_no,

        'employee_basic_salary' => $request->employee_basic_salary,
        'employee_housing_allowance' => $request->employee_housing_allowance,
        'employee_comission' => $request->employee_comission,
        'other_allowances' => $request->other_allowances,
        'employee_bonuses' => $request->employee_bonuses,

        'employee_paye' => $request->employee_paye,
        'employee_nssf' => $request->employee_nssf,
        'employee_nhif' => $request->employee_nhif,
        'employee_cotu' => $request->employee_cotu,
        'employee_loans' => $request->employee_loans,
        

        

        'updated_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Employee Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-employee')->with($notification);

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

        return redirect()->route('manage-employee')->with($notification);

    }

    public function EmployeeEdit($id){

        $employees = Employee::findOrFail($id);
        return view('admin.backend.employee.edit_employee',compact('employees'));

    }

    public function EmployeeImageUpdate(Request $request){
        $employee_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('employee_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/employee/'.$name_gen);
            $save_url = 'upload/employee/'.$name_gen;

            Employee::findOrFail($employee_id)->update([
                'employee_image' => $save_url,
                'updated_at' => Carbon::now(),

            ]);

             $notification = array(
                'message' => 'Employee Image Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-employee')->with($notification);

     } // end method

     public function EmployeeDelete($id){
        $employee = Employee::findOrFail($id);
        unlink($employee->employee_image);
        Employee::findOrFail($id)->delete();

        

        $notification = array(
            'message' => 'Employee Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     }// end method 
}
