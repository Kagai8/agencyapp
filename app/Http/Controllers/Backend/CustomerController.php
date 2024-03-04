<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function CreateCustomerAccount(){
        
        return view('admin.backend.customer.add_customer');
    }

    public function StoreCustomerDetails(Request $request){    


        $customer_id = Customer::insertGetId([

        'customer_name' => $request->customer_name,
        'customer_email' => $request->customer_email,
        'customer_phone_no' => $request->customer_phone_no,
        'customer_kra_pin' => $request->customer_kra_pin,
        'customer_gender' => $request->customer_gender,
        'customer_national_id' => $request->customer_national_id,
        'customer_contact_person_name' => $request->customer_contact_person_name,
        'customer_contact_person_email' => $request->customer_contact_person_email,
        'customer_contact_person_phone' => $request->customer_contact_person_phone,
        'customer_discount' => $request->customer_discount,
        'created_by' => auth()->user()->name,
        

        'created_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Customer Account Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-customer-account')->with($notification);

    }

    public function ManageCustomerAccount(){

        $customers = Customer::latest()->get();
        
        return view('admin.backend.customer.view_customer',compact('customers'));
    }

    public function EditCustomerDetails($id){

        $customer = Customer::findOrFail($id);
        
        return view('admin.backend.customer.edit_customer',compact('customer'));
    }

    public function UpdateCustomerDetails(Request $request){    

        $customer_id = $request->id;

        Customer::findOrFail($customer_id)->update([
        'customer_name' => $request->customer_name,
        'customer_email' => $request->customer_email,
        'customer_phone_no' => $request->customer_phone_no,
        'customer_kra_pin' => $request->customer_kra_pin,
        'customer_gender' => $request->customer_gender,
        'customer_national_id' => $request->customer_national_id,
        'customer_contact_person_name' => $request->customer_contact_person_name,
        'customer_contact_person_email' => $request->customer_contact_person_email,
        'customer_contact_person_phone' => $request->customer_contact_person_phone,
        'customer_discount' => $request->customer_discount,
        

        

        'updated_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Customer Details Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-customer-account')->with($notification);

    }

    public function DeleteCustomerDetails($id){

        $customer = Customer::findOrFail($id);
        
        Customer::findOrFail($id)->delete();

        

        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CustomerAccountDetails($id){

    
        $customer = Customer::with('paymentPlans','onetimePurchases','installments')->findOrFail($id);
        
        return view('admin.backend.customer.details_customer',compact('customer'));
    }

    public function SearchCustomerAccount(Request $request){

        $searchTerm = $request->customer_search;

        // Perform a partial match search on goat_id
        $customers = Customer::where('customer_name', 'LIKE', "%$searchTerm%")->latest()->get();

        return view('admin.backend.customer.search', compact('customers', 'searchTerm'));

    
    }
    
}
