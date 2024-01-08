<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\PayRollController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\PaymentPlanController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');;
});
Route::get('/laravel', function () {
    return view('welcome');;
});

Route::group(['middleware' => ['auth', 'check.role:Admin,Manager,Chairman,User']], function (){

    //Customer Module

    Route::get('/admin/customer/create/account', [CustomerController::class, 'CreateCustomerAccount'])->name('create-customer-account');
    Route::post('/admin/customer/store/account', [CustomerController::class, 'StoreCustomerDetails'])->name('store-customer-details');
    Route::get('/admin/customer/manage/account', [CustomerController::class, 'ManageCustomerAccount'])->name('manage-customer-account');

    Route::get('/admin/customer/edit/account/{id}', [CustomerController::class, 'EditCustomerDetails'])->name('edit-customer-details');
    Route::post('/admin/customer/update/account', [CustomerController::class, 'UpdateCustomerDetails'])->name('update-customer-details');
    Route::get('/admin/customer/delete/account/{id}', [CustomerController::class, 'DeleteCustomerDetails'])->name('delete-customer-details');


    //One Time Purchase
    Route::get('/admin/create/onetime/purchase', [PaymentPlanController::class, 'CreateOneTimePurchase'])->name('create-onetime-purchase');
    Route::post('/admin/store/onetime/purchase', [PaymentPlanController::class, 'StoreOneTimePurchase'])->name('store-onetime-purchase');
    Route::get('/admin/view/onetime/purchase', [PaymentPlanController::class, 'ViewOneTimePurchase'])->name('view-onetime-purchases');
    Route::get('/test/account/{id}', [PaymentPlanController::class, 'Test'])->name('test.details');
    Route::get('/receipt-generate-pdf/{id}', [PaymentPlanController::class, 'generatePDF'])->name('receipt-generate-pdf');


    //Payment Plan

    Route::get('/admin/create/payment/plan', [PaymentPlanController::class, 'CreatePaymentPlan'])->name('create-payment-plan');
    Route::post('/admin/store/payment/plan', [PaymentPlanController::class, 'StorePaymentPlan'])->name('store-payment-plan');
    Route::get('/admin/view/payment/plans', [PaymentPlanController::class, 'ViewPaymentPlans'])->name('view-payment-plans');
    Route::get('/admin/payment/status/{id}', [CustomerController::class, 'PaymentPlanActive'])->name('active-payment-plans');
    Route::get('paymentplan/inactive/{id}', [PaymentPlanController::class, 'PaymentPlanInactive'])->name('paymentplan.inactive');

    Route::get('paymentplan/active/{id}', [PaymentPlanController::class, 'PaymentPlanActive'])->name('paymentplan.active');
    
    Route::get('/admin/check/commission', [PaymentPlanController::class, 'ViewCommission'])->name('commission-check');
    Route::get('/invoice/payment/{id}', [PaymentPlanController::class, 'Invoice'])->name('invoice.payment');
    Route::get('/receipt/generate/pp/{id}', [PaymentPlanController::class, 'generatePlanPDF'])->name('receipt-generate-pp');


    Route::get('/change/user/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/update/user/password', [UserController::class, 'UserUpdatePassword'])->name('update-user-password');
   
    

    



});

Route::group(['middleware' => ['auth', 'check.role:Admin,Manager,Chairman']], function (){

    //User Management
    Route::get('/admin/create/user', [UserController::class, 'CreateUser'])->name('create-user');
    Route::post('/admin/store/user', [UserController::class, 'StoreUser'])->name('store-user');
    Route::get('/admin/view/user', [UserController::class, 'ViewUser'])->name('view-user');
    Route::get('/admin/user/edit/{id}', [UserController::class, 'EditUser'])->name('edit-user');
    Route::post('/admin/user/update/{id}', [UserController::class, 'UpdateUser'])->name('update-user');
    Route::get('/admin/user/delete/{id}', [UserController::class, 'DeleteUser'])->name('delete-user');


//Employee Module
    Route::get('/admin/dashboard', function () {
                return view('dashboard');
            })->middleware(['auth', 'verified'])->name('dashboard');
           Route::get('/admin/add/employee', [EmployeeController::class, 'EmployeeAdd'])->name('employee.add');
    Route::get('/admin/manage/employee', [EmployeeController::class, 'EmployeeManage'])->name('manage-employee');
    Route::post('/admin/store/employee', [EmployeeController::class, 'EmployeeStore'])->name('employee-store');
    
    Route::post('/admin/update/employee', [EmployeeController::class, 'EmployeeUpdate'])->name('employee-update');
    Route::get('employee/delete/{id}', [EmployeeController::class, 'EmployeeDelete'])->name('employee.delete');
    Route::post('/admin/update/employee/image', [EmployeeController::class, 'EmployeeImageUpdate'])->name('update-employee-image');
    Route::post('/admin/update/employee/days', [EmployeeController::class, 'EmployeeUpdateDays'])->name('employee-update-days');
    Route::get('/edit/employee/{id}', [EmployeeController::class, 'EmployeeEdit'])->name('employee.details');
    Route::get('/edit/employee/performance/{id}', [EmployeeController::class, 'EmployeePerformance'])->name('employee.performance');

    Route::get('/admin/generate/payroll', [PayRollController::class, 'EmployeeGeneratePayroll'])->name('generate-payroll');
    Route::get('/admin/payslip/{id}', [PayRollController::class, 'generatePayslip'])->name('generate-payslip');

});

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
});

Route::group(['middleware' => ['auth', 'check.role:Chairman']], function (){

    Route::get('paymentplan/disapproved/{id}', [PaymentPlanController::class, 'PaymentPlanNotApproved'])->name('paymentplan.disapproved');

    Route::get('paymentplan/approved/{id}', [PaymentPlanController::class, 'PaymentPlanApproved'])->name('paymentplan.approved');
});
/* Route::middleware('auth')->group(function () {


    Route::get('/admin/add/employee', [EmployeeController::class, 'EmployeeAdd'])->name('employee.add');
    Route::get('/admin/manage/employee', [EmployeeController::class, 'EmployeeManage'])->name('manage-employee');
    Route::post('/admin/store/employee', [EmployeeController::class, 'EmployeeStore'])->name('employee-store');
    
    Route::post('/admin/update/employee', [EmployeeController::class, 'EmployeeUpdate'])->name('employee-update');
    Route::get('employee/delete/{id}', [EmployeeController::class, 'EmployeeDelete'])->name('employee.delete');
    Route::post('/admin/update/employee/image', [EmployeeController::class, 'EmployeeImageUpdate'])->name('update-employee-image');
    Route::post('/admin/update/employee/days', [EmployeeController::class, 'EmployeeUpdateDays'])->name('employee-update-days');

    //Customer Module

    Route::get('/admin/customer/create/account', [CustomerController::class, 'CreateCustomerAccount'])->name('create-customer-account');
    Route::post('/admin/customer/store/account', [CustomerController::class, 'StoreCustomerDetails'])->name('store-customer-details');
    Route::get('/admin/customer/manage/account', [CustomerController::class, 'ManageCustomerAccount'])->name('manage-customer-account');

    Route::get('/admin/customer/edit/account/{id}', [CustomerController::class, 'EditCustomerDetails'])->name('edit-customer-details');
    Route::post('/admin/customer/update/account', [CustomerController::class, 'UpdateCustomerDetails'])->name('update-customer-details');
    Route::get('/admin/customer/delete/account/{id}', [CustomerController::class, 'DeleteCustomerDetails'])->name('delete-customer-details');


    //One Time Purchase
    Route::get('/admin/create/onetime/purchase', [PaymentPlanController::class, 'CreateOneTimePurchase'])->name('create-onetime-purchase');
    Route::post('/admin/store/onetime/purchase', [PaymentPlanController::class, 'StoreOneTimePurchase'])->name('store-onetime-purchase');
    Route::get('/admin/view/onetime/purchase', [PaymentPlanController::class, 'ViewOneTimePurchase'])->name('view-onetime-purchases');
    Route::get('/test/account/{id}', [PaymentPlanController::class, 'Test'])->name('test.details');


    //Payment Plan

    Route::get('/admin/create/payment/plan', [PaymentPlanController::class, 'CreatePaymentPlan'])->name('create-payment-plan');
    Route::post('/admin/store/payment/plan', [PaymentPlanController::class, 'StorePaymentPlan'])->name('store-payment-plan');
    Route::get('/admin/view/payment/plans', [PaymentPlanController::class, 'ViewPaymentPlans'])->name('view-payment-plans');
    Route::get('/admin/payment/status/{id}', [CustomerController::class, 'PaymentPlanActive'])->name('active-payment-plans');
    Route::get('paymentplan/inactive/{id}', [PaymentPlanController::class, 'PaymentPlanInactive'])->name('paymentplan.inactive');

    Route::get('paymentplan/active/{id}', [PaymentPlanController::class, 'PaymentPlanActive'])->name('paymentplan.active');
    
    Route::get('/admin/check/commission', [PaymentPlanController::class, 'ViewCommission'])->name('commission-check');
    Route::get('/invoice/payment/{id}', [PaymentPlanController::class, 'Invoice'])->name('invoice.payment');

   
    //User Management

    Route::get('/admin/create/user', [UserController::class, 'CreateUser'])->name('create-user');
    Route::post('/admin/store/user', [UserController::class, 'StoreUser'])->name('store-user');
    Route::get('/admin/view/user', [UserController::class, 'ViewUser'])->name('view-user');
    Route::get('/admin/user/edit/{id}', [UserController::class, 'EditUser'])->name('edit-user');
    Route::post('/admin/user/update/{id}', [UserController::class, 'UpdateUser'])->name('update-user');
    Route::get('/admin/user/delete/{id}', [UserController::class, 'DeleteUser'])->name('delete-user');
    
});*/

/*Route::get('/edit/employee/{id}', [EmployeeController::class, 'EmployeeEdit'])->name('employee.details');

 Route::get('/admin/generate/payroll', [PayRollController::class, 'EmployeeGeneratePayroll'])->name('generate-payroll');
 Route::get('/admin/payslip/{id}', [PayRollController::class, 'generatePayslip'])->name('generate-payslip');*/

require __DIR__.'/auth.php';


