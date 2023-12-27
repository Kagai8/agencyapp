<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\PaymentPlan;
use App\Models\Commission;
use App\Models\OneTimePurchase;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PaymentPlanController extends Controller
{
    public function CreatePaymentPlan(){

        $customers = Customer::all();
        
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
                    // Add other fields as needed
                ]);

                // Save the payment plan to the customer
                $customer->paymentPlans()->save($paymentPlan);

                $commission = new Commission([
                    'commission' => $commissionAmount,
                    'payment_plan_id' => $paymentPlan->id,
                    // Add other fields as needed
                ]);
                $commission->save();

                $notification = array(
                'message' => 'PaymentPlan Added Successfully Plus Commission Credited',
                'alert-type' => 'success'
                );

                return redirect()->route('view-payment-plans')->with($notification);
    }

    

    

    public function ViewPaymentPlans(){

         $payment_plans = DB::table('payment_plans')
            ->join('customers', 'payment_plans.customer_id', '=', 'customers.id')
            ->select('payment_plans.*', 'customers.customer_name')
            ->get();
        
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

    public function Invoice($id)
    {
        $paymentplan = PaymentPlan::with('customer')->findOrFail($id);
        return view('admin.backend.invoice', compact('paymentplan'));
    }


    public function ViewCommission(){

         $commission_payment_plans = DB::table('commissions')
            ->join('payment_plans', 'commissions.payment_plan_id', '=', 'payment_plans.id')
            ->select('commissions.*', 'payment_plans.original_amount')
            ->get();

         $commission_onetime_purchases = DB::table('commissions')
            ->join('one_time_purchases', 'commissions.onetime_purchase_id', '=', 'one_time_purchases.id')
            ->select('commissions.*', 'one_time_purchases.original_amount')
            ->get();
        
        return view('admin.commission.view_commissions',compact('commission_payment_plans','commission_onetime_purchases'));
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
                'message' => 'PaymentPlan Added Successfully Plus Commission Credited',
                'alert-type' => 'success'
                );

                return redirect()->route('view-payment-plans')->with($notification);
    }

    

    

    public function ViewOneTimePurchase(){

         $onetime_purchases = DB::table('one_time_purchases')
            ->join('customers', 'one_time_purchases.customer_id', '=', 'customers.id')
            ->select('one_time_purchases.*', 'customers.customer_name')
            ->get();
        
        return view('admin.paymentplan.view_onetime_purchase',compact('onetime_purchases'));
    } 

    public function Test($id)
    {
        $onetime_purchase = OneTimePurchase::with('customer')->findOrFail($id);
        return view('admin.backend.test', compact('onetime_purchase'));
    }
}
