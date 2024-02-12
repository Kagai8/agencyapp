<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\PaymentPlan;
use App\Models\Commission;
use App\Models\OneTimePurchase;
use App\Models\Installment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Pdf;

class PaymentPlanController extends Controller
{
//Payment Plans Functions
    public function CreatePaymentPlan(){

        $customers = Customer::latest()->get();
        
        return view('admin.paymentplan.add_paymentplan',compact('customers'));
    }


    public function StorePaymentPlan(Request $request){
        // Retrieve the customer based on the provided customer_id
        $customer = Customer::findOrFail($request->customer_id);

        
        

        // Calculate the commission for the insurance agency (adjust the commission rate as needed)
        $commissionRate = $request->commission_premium / 100;
        $commissionAmount = $request->input('net_amount') * $commissionRate;

        // Create a new PaymentPlan instance
        $paymentPlan = new PaymentPlan([
            'original_amount' => $request->input('original_amount'),
            
            'net_amount' => $request->input('net_amount'),
            'balance' => $request->input('net_amount'),
            
            'months' => $request->input('months'),
            'months_left' => $request->input('months'),
            'commission_premium' => $request->input('commission_premium'),
            'deposit_amount' => $request->input('deposit_amount'),
            'created_by' => auth()->user()->name,
            'approval' => ($request->input('months') <= 3) ? 1 : 0,
            'commission_credited' => ($request->input('months') <= 3) ? 1 : 0,

            // Add other fields as needed
        ]);

        // Save the payment plan to the customer
        $customer->paymentPlans()->save($paymentPlan);

        // Process installment information
        $installments = $request->input('installment');
        $due_dates = $request->input('due_date');
        $payment_options = $request->input('payment_option');

        // Loop through each installment and due date, and create Installment records
        foreach ($installments as $key => $installmentAmount) {
            $installment = new Installment([
                'installment' => $installmentAmount,
                'payment_option' => $payment_options[$key], // Add payment option
                'due_date' => $due_dates[$key],
                'status' => 0, // Set status to unpaid by default
                'created_at' => Carbon::now(), // Set the current timestamp as the creation time
                 // Set the current timestamp as the update time
                'payment_plan_id' => $paymentPlan->id, // Associate the installment with the payment plan
                'customer_id' => $customer->id, // Associate the installment with the customer
                'recorded_by' => auth()->user()->name, // Assuming you want to record the current user who adds the installment
            ]);
            // Save the installment to the payment plan
            $paymentPlan->installments()->save($installment);
        }

        // If the plan is approved and duration is less than or equal to 3 months, calculate and store commission
        if ($paymentPlan->approval == 1 && $paymentPlan->months <= 3) {
            $commission = new Commission([
                'commission' => $commissionAmount,
                'payment_plan_id' => $paymentPlan->id,
                // Add other fields as needed
            ]);
            $commission->save();
        }

        $notification = array(
            'message' => 'PaymentPlan Added Successfully' . (($paymentPlan->months <= 3) ? ' Plus Commission Credited' : ' Waiting Approval'),
            'alert-type' => 'success'
        );

        return redirect()->route('view-payment-plans')->with($notification);
    }

    public function EditPaymentBalance($id){

        $payment_plan = PaymentPlan::findOrFail($id);

        return view('admin.paymentplan.edit_payment', compact('payment_plan'));
    }

    public function UpdatePaymentPlanBalance(Request $request){

        $payment_plan_id = $request->id;

        $payment_plan = PaymentPlan::findOrFail($payment_plan_id);

        $newBalance = $payment_plan->balance - $request->installment;

       
        $monthsLeft = max($payment_plan->months_left - 1, 0);

        PaymentPlan::findOrFail($payment_plan_id)->update([

        'balance' => $newBalance,
        'due_date' => $request->due_date,
        'months_left' => $monthsLeft,
        

        'updated_at' => Carbon::now(),   

            ]);
        $notification = array(
            'message' => 'Balance Updated Successfully',
            'alert-type' => 'success'
        );

        // Create a new installment with the associated customer
            $installment = new Installment([
                'payment_plan_id' => $payment_plan->id,
                'customer_id' => $payment_plan->customer_id,
                'installment' => $request->installment,
                'due_date' => $request->due_date,
                'recorded_by' => auth()->user()->name, // Use the user's name
            ]);
            $installment->save();

        return redirect()->route('view-payment-plans')->with($notification);
    }

    public function ViewInstallments(){

         $installments = DB::table('installments')
        ->join('payment_plans', 'installments.payment_plan_id', '=', 'payment_plans.id')
        ->join('customers', 'installments.customer_id', '=', 'customers.id')
        ->select(
            'installments.*',
            'customers.customer_name',
            'payment_plans.id as payment_plan_id'
        )
        ->latest()
        ->get();

    return view('admin.paymentplan.view_installments', compact('installments'));
    }

    public function GenerateInstallmentReceipt($id)
        {
            // Fetch data for the receipt
            $installment = Installment::with('customer')->findOrFail($id);

            // Generate PDF using the 'your-receipt-view' Blade view and the fetched data
            $pdf = PDF::loadView('admin.backend.print_installment', compact('installment'));

            // Return the PDF as a response
            return new Response($pdf->output(), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="Receipt_IM' . $installment->id . '.pdf"',
            ]);
        }

    public function viewInstallment($id)
        {
            // Fetch the payment plan
            $payment_plan = PaymentPlan::findOrFail($id);

            // Fetch the installment history for the payment plan with customer names
            $installmentHistory = Installment::with('customer')
                ->where('payment_plan_id', $id)
                ->latest()
                ->get();

            return view('admin.paymentplan.installment_history', compact('payment_plan', 'installmentHistory'));
        }

    public function GeneratePaymentPlanInstallmentsReceipt($id)
        {
            // Fetch data for the receipt
            $payment_plan = PaymentPlan::with('customer')->findOrFail($id);

            $totalInstallments = Installment::where('payment_plan_id', $id)->sum('installment');

            // Fetch the installment history for the payment plan with customer names
            $installmentHistory = Installment::with('customer')
                ->where('payment_plan_id', $id)
                ->latest()
                ->get();

            // Load customer data for each installment
            $installmentHistory->load('customer');

            // Generate PDF using the 'your-receipt-view' Blade view and the fetched data
            $pdf = PDF::loadView('admin.backend.print_installment_history', compact('payment_plan', 'installmentHistory','totalInstallments'));

            // Return the PDF as a response
            return new Response($pdf->output(), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="DonePaymentPlanReceipt_PP' . $payment_plan->id . '.pdf"',
            ]);
        }



    public function ViewPaymentPlans(){

         $payment_plans = DB::table('payment_plans')
            ->join('customers', 'payment_plans.customer_id', '=', 'customers.id')
            ->select('payment_plans.*', 'customers.customer_name','customers.customer_discount')
            ->latest()->get();
        
        return view('admin.paymentplan.view_paymentplans',compact('payment_plans'));
    } 

    public function OverviewPaymentPlans(){

         $payment_plans = DB::table('payment_plans')
            ->join('customers', 'payment_plans.customer_id', '=', 'customers.id')
            ->where('approval', 1)
            ->select('payment_plans.*', 'customers.customer_name','customers.customer_discount')
            ->latest()->get();
        
        return view('admin.paymentplan.overview_paymentplans',compact('payment_plans'));
    } 

    public function PaymentPlanInactive($id){
        PaymentPlan::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Payment Plan Not Done',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
     }


    public function PaymentPlanActive($id){
        PaymentPlan::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Payment Plan Done',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
     }

    public function PaymentPlanApproved($id){
        $paymentPlan = PaymentPlan::findOrFail($id);

        // Check if the user is the chairman
                if (auth()->user()->role->name == 'Chairman') {
                    // Chairman can approve
                    $paymentPlan->update(['approval' => 1]);

                    // If the plan is approved and duration is greater than 3 months, calculate and store commission
                    if ($paymentPlan->months > 3) {
                        $commission = new Commission([
                            'commission' => $paymentPlan->original_amount * ($paymentPlan->commission_premium / 100),
                            'payment_plan_id' => $paymentPlan->id,
                            // Add other fields as needed
                        ]);
                        $commission->save();

                        $notification = array(
                            'message' => 'Payment Plan Has Been Approved Plus Commission Credited',
                            'alert-type' => 'success'
                        );
                    } else {
                        $notification = array(
                            'message' => 'Payment Plan Has Been Approved',
                            'alert-type' => 'success'
                        );
                    }
                } else {
                    $notification = array(
                        'message' => 'You do not have permission to approve payment plans.',
                        'alert-type' => 'error'
                    );
                }

                return redirect()->back()->with($notification);
        }


    public function PaymentPlanNotApproved($id){
                $paymentPlan = PaymentPlan::findOrFail($id);
                $paymentPlan->update(['approval' => 0]);

                $notification = array(
                    'message' => 'Payment Plan Not Approved',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);
            }


    public function Invoice($id)
    {
        $paymentplan = PaymentPlan::with('customer')->findOrFail($id);
        return view('admin.backend.invoice', compact('paymentplan'));
    }

    public function generatePlanPDF($id)
    {
        // Fetch data for the receipt
        $paymentplan = PaymentPlan::with('customer', 'installments')->findOrFail($id);

        // Generate PDF using the 'your-receipt-view' Blade view and the fetched data
        $pdf = PDF::loadView('admin.backend.print_pp', compact('paymentplan'));

        // Return the PDF as a response
        return new Response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Receipt_PP' . $paymentplan->id . '.pdf"',
        ]);
    }

    //Comission Section

    public function ViewCommission(){

         $commission_payment_plans = DB::table('commissions')
            ->join('payment_plans', 'commissions.payment_plan_id', '=', 'payment_plans.id')
            ->select('commissions.*', 'payment_plans.*', 'payment_plans.created_by as payment_plan_created_by')
            ->latest('payment_plans.created_at') // Specify the table for created_at column
            ->get();

        $commission_onetime_purchases = DB::table('commissions')
            ->join('one_time_purchases', 'commissions.onetime_purchase_id', '=', 'one_time_purchases.id')
            ->select('commissions.*', 'one_time_purchases.*', 'one_time_purchases.created_by as onetime_purchase_created_by')
            ->latest('one_time_purchases.created_at') // Specify the table for created_at column
            ->get();

        $currentUserName = auth()->user()->name;

        $commission_payment_plans_by_current_user = DB::table('commissions')
            ->join('payment_plans', 'commissions.payment_plan_id', '=', 'payment_plans.id')
            ->where('payment_plans.created_by', $currentUserName)
            ->select('commissions.*', 'payment_plans.*', 'payment_plans.created_by as payment_plan_created_by')
            ->latest('payment_plans.created_at') // Specify the table for created_at column
            ->get();

        $commission_onetime_purchases_by_current_user = DB::table('commissions')
            ->join('one_time_purchases', 'commissions.onetime_purchase_id', '=', 'one_time_purchases.id')
            ->where('one_time_purchases.created_by', $currentUserName)
            ->select('commissions.*', 'one_time_purchases.*', 'one_time_purchases.created_by as onetime_purchase_created_by')
            ->latest('one_time_purchases.created_at') // Specify the table for created_at column
            ->get();



        
        return view('admin.commission.view_commissions',compact('commission_payment_plans','commission_onetime_purchases','commission_onetime_purchases_by_current_user','commission_payment_plans_by_current_user'));
    } 

    //Comission Section
    public function CreateOneTimePurchase(){

        $customers = Customer::all();
        
        return view('admin.paymentplan.add_onetime_purchase',compact('customers'));
    }


    public function StoreOneTimePurchase(Request $request){


                // Retrieve the customer based on the provided customer_id
                $customer = Customer::findOrFail($request->customer_id);

                

                

                // Calculate the commission for the insurance agency (adjust the commission rate as needed)
                    $commissionRate = $request->commission_premium / 100;
                    $commissionAmount = $request->input('net_amount') * $commissionRate;

                
                
                // Create a new One Time Purchase instance
                $onetimePurchase = new OneTimePurchase([
                    'original_amount' => $request->input('original_amount'),
                    'net_amount' => $request->input('net_amount'),
                    'payment_option' => $request->input('payment_option'),
                    'transaction_code' => $request->input('transaction_code'),
                    'commission_premium' => $request->input('commission_premium'),
                    'created_by' => auth()->user()->name,
                    
                    // Add other fields as needed
                ]);

                // Save the payment plan to the customer
                $customer->onetimePurchases()->save($onetimePurchase);

                $commission = new Commission([
                    'commission' => $commissionAmount,
                    'onetime_purchase_id' => $onetimePurchase->id,
                    // Add other fields as needed
                ]);
                $commission->save();

                $notification = array(
                'message' => 'One Time Purchase Added Successfully Plus Commission Credited',
                'alert-type' => 'success'
                );

                return redirect()->route('view-onetime-purchases')->with($notification);
    }

    

    

    public function ViewOneTimePurchase(){

         $onetime_purchases = DB::table('one_time_purchases')
            ->join('customers', 'one_time_purchases.customer_id', '=', 'customers.id')
            ->select('one_time_purchases.*', 'customers.customer_name','customers.customer_discount')
            ->latest()->get();
        
        return view('admin.paymentplan.view_onetime_purchase',compact('onetime_purchases'));
    } 

    public function Test($id)
    {
        $onetime_purchase = OneTimePurchase::with('customer')->findOrFail($id);
        return view('admin.backend.test', compact('onetime_purchase'));
    }

    public function generatePDF($id)
    {
        // Fetch data for the receipt
        $onetime_purchase = OneTimePurchase::with('customer')->findOrFail($id);

        // Generate PDF using the 'your-receipt-view' Blade view and the fetched data
        $pdf = PDF::loadView('admin.backend.print_ot', compact('onetime_purchase'));

        // Return the PDF as a response
        return new Response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Receipt_PP' . $onetime_purchase->id . '.pdf"',
        ]);
    }

    public function PaymentPlanDetails($id){

// Retrieve the payment plan along with its related customer and installments
    $payment_plan = PaymentPlan::with('customer', 'installments')->findOrFail($id);

    // You can also retrieve related commission if needed
    $commission = $payment_plan->commission;

    // Alternatively, if you want to access the customer's data directly, you can do so like this:
    // $customer = $payment_plan->customer;

    // Now you have access to all related data, including installments
    // You can pass these variables to your view
    return view('admin.paymentplan.payment_plan_details', compact('payment_plan', 'commission'));

    }

    public function EditInstallmentDetails($id) {
    // Retrieve the installment based on the provided ID
    $installment = Installment::findOrFail($id);

    // Pass the $installment variable to the view
    return view('admin.paymentplan.edit_installment', compact('installment'));
}

    public function UpdateInstallmentDetails(Request $request){    

        $installment_id = $request->id;

        $installment = Installment::findOrFail($installment_id);

        Installment::findOrFail($installment_id)->update([

            'installment' => $request->installment,
            'transaction_code' => $request->transaction_code,
            'payment_option' => $request->payment_option,
            'updated_by' => auth()->user()->name,
            'status' => $request->status,
            
            'updated_at' => Carbon::now(),   

            ]);
        // Recalculate the remaining months for the associated payment plan
            $paymentPlan = $installment->paymentPlan;
            $remainingMonths = $paymentPlan->installments()->where('status', 0)->count();

            // Update the remaining months for the payment plan
            $paymentPlan->update([
                'months_left' => $remainingMonths,
            ]);
        // Recalculate the balance for the associated payment plan
            $paymentPlan = $installment->paymentPlan;
            $totalPaidAmount = $paymentPlan->installments()->where('status', 1)->sum('installment');

            // Update the balance based on the total paid amount
            $paymentPlan->update([
                'balance' => $paymentPlan->net_amount - $totalPaidAmount,
            ]);
        $notification = array(
            'message' => 'Installment Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view-payment-plans')->with($notification);

    }
    
}
