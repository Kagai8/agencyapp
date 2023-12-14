<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\PaymentPlan;
use App\Models\Commission;
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

                if ($discountedPremium > $customer->customer_credit_limit) {
                        $notification = array(
                        'message' => 'Credit Limit is Low',
                        'alert-type' => 'info'
                    );

                        return redirect()->back()->with($notification);
                    }

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


    public function ViewCommission(){

         $commissions = DB::table('commissions')
            ->join('payment_plans', 'commissions.payment_plan_id', '=', 'payment_plans.id')
            ->select('commissions.*', 'payment_plans.original_amount')
            ->get();
        
        return view('admin.commission.view_commissions',compact('commissions'));
    } 
}
