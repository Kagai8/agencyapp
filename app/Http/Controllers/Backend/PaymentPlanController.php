<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\PaymentPlan;
use App\Models\Commission;
use App\Models\OneTimePurchase;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Pdf;

class PaymentPlanController extends Controller
{
    public function CreatePaymentPlan(){

        $customers = Customer::latest()->get();
        
        return view('admin.paymentplan.add_paymentplan',compact('customers'));
    }


    public function StorePaymentPlan(Request $request){
    // Retrieve the customer based on the provided customer_id
    $customer = Customer::findOrFail($request->customer_id);

    $discountedPremium = $request->original_amount - $customer->discount;

    // Calculate the commission for the insurance agency (adjust the commission rate as needed)
    $commissionRate = $request->commission_premium / 100;
    $commissionAmount = $request->input('original_amount') * $commissionRate;

    // Create a new PaymentPlan instance
    $paymentPlan = new PaymentPlan([
        'original_amount' => $request->input('original_amount'),
        'amount' => $discountedPremium,
        'due_date' => $request->input('due_date'),
        'months' => $request->input('months'),
        'commission_premium' => $request->input('commission_premium'),
        'deposit_amount' => $request->input('deposit_amount'),
        'created_by' => auth()->user()->name,
        'approval' => ($request->input('months') <= 3) ? 1 : 0,
        'commission_credited' => ($request->input('months') <= 3) ? 1 : 0,

        // Add other fields as needed
    ]);

    // Save the payment plan to the customer
    $customer->paymentPlans()->save($paymentPlan);

    // If the plan is approved and duration is less than or equal to 3 months, calculate and store commission
    if ($paymentPlan->approval == 0 && $paymentPlan->months <= 3) {
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


    

    

    public function ViewPaymentPlans(){

         $payment_plans = DB::table('payment_plans')
            ->join('customers', 'payment_plans.customer_id', '=', 'customers.id')
            ->select('payment_plans.*', 'customers.customer_name','customers.customer_discount')
            ->latest()->get();
        
        return view('admin.paymentplan.view_paymentplans',compact('payment_plans'));
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


    public function ViewCommission(){

         $commission_payment_plans = DB::table('commissions')
            ->join('payment_plans', 'commissions.payment_plan_id', '=', 'payment_plans.id')
            ->select('commissions.*', 'payment_plans.original_amount','payment_plans.created_by')
            ->latest()->get();

         $commission_onetime_purchases = DB::table('commissions')
            ->join('one_time_purchases', 'commissions.onetime_purchase_id', '=', 'one_time_purchases.id')
            ->select('commissions.*', 'one_time_purchases.original_amount', 'one_time_purchases.created_by')
            ->latest()->get();

        $currentUserName = auth()->user()->name;

        $commission_payment_plans_by_current_user = DB::table('commissions')
            ->join('payment_plans', 'commissions.payment_plan_id', '=', 'payment_plans.id')
            ->where('payment_plans.created_by', $currentUserName)
            ->select('commissions.*', 'payment_plans.original_amount', 'payment_plans.created_by')
            ->latest()
            ->get();

        $commission_onetime_purchases_by_current_user = DB::table('commissions')
            ->join('one_time_purchases', 'commissions.onetime_purchase_id', '=', 'one_time_purchases.id')
            ->where('one_time_purchases.created_by', $currentUserName)
            ->select('commissions.*', 'one_time_purchases.original_amount', 'one_time_purchases.created_by')
            ->latest()
            ->get();
        
        return view('admin.commission.view_commissions',compact('commission_payment_plans','commission_onetime_purchases','commission_onetime_purchases_by_current_user','commission_payment_plans_by_current_user'));
    } 


    public function CreateOneTimePurchase(){

        $customers = Customer::all();
        
        return view('admin.paymentplan.add_onetime_purchase',compact('customers'));
    }


    public function StoreOneTimePurchase(Request $request){


                // Retrieve the customer based on the provided customer_id
                $customer = Customer::findOrFail($request->customer_id);

                $discountedPremium = $request->original_amount - $customer->discount;

                

                // Calculate the commission for the insurance agency (adjust the commission rate as needed)
                    $commissionRate = $request->commission_premium / 100;
                    $commissionAmount = $request->input('original_amount') * $commissionRate;

                
                
                // Create a new One Time Purchase instance
                $onetimePurchase = new OneTimePurchase([
                    'original_amount' => $request->input('original_amount'),
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
            'Content-Disposition' => 'inline; filename="receipt.pdf"',
        ]);
    }

    public function generatePlanPDF($id)
    {
        // Fetch data for the receipt
        $paymentplan = PaymentPlan::with('customer')->findOrFail($id);

        // Generate PDF using the 'your-receipt-view' Blade view and the fetched data
        $pdf = PDF::loadView('admin.backend.print_pp', compact('paymentplan'));

        // Return the PDF as a response
        return new Response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="receipt.pdf"',
        ]);
    }
}
