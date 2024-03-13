<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\PayRollController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\PaymentPlanController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ReportsController;
use App\Http\Controllers\SettingsController;
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
Route::get('/minister/login', function () {
    return view('superadmin/auth/login');;
});
Route::get('/laravel', function () {
    return view('welcome');;
});

Route::group(['middleware' => ['auth', 'check.role:Admin,Manager,Chairman,User,Minister']], function (){

    //Customer Module

    Route::get('/admin/customer/create/account', [CustomerController::class, 'CreateCustomerAccount'])->name('create-customer-account');
    Route::post('/admin/customer/store/account', [CustomerController::class, 'StoreCustomerDetails'])->name('store-customer-details');
    Route::get('/admin/customer/manage/account', [CustomerController::class, 'ManageCustomerAccount'])->name('manage-customer-account');
    Route::get('/admin/customer/edit/account/{id}', [CustomerController::class, 'EditCustomerDetails'])->name('edit-customer-details');
    Route::post('/admin/customer/update/account', [CustomerController::class, 'UpdateCustomerDetails'])->name('update-customer-details');
    Route::get('/admin/customer/delete/account/{id}', [CustomerController::class, 'DeleteCustomerDetails'])->name('delete-customer-details');
    Route::get('/admin/customer/details/{id}', [CustomerController::class, 'CustomerAccountDetails'])->name('customer-account');
    Route::post('/admin/customer/search/account', [CustomerController::class, 'SearchCustomerAccount'])->name('customer-search');
    


    //One Time Purchase
    Route::get('/admin/create/onetime/purchase', [PaymentPlanController::class, 'CreateOneTimePurchase'])->name('create-onetime-purchase');
    Route::post('/admin/store/onetime/purchase', [PaymentPlanController::class, 'StoreOneTimePurchase'])->name('store-onetime-purchase');
    Route::get('/admin/view/onetime/purchase', [PaymentPlanController::class, 'ViewOneTimePurchase'])->name('view-onetime-purchases');
    Route::get('/test/account/{id}', [PaymentPlanController::class, 'Test'])->name('test.details');
    Route::get('/receipt-generate-pdf/{id}', [PaymentPlanController::class, 'generatePDF'])->name('receipt-generate-pdf');
    Route::post('/admin/onetime/search', [PaymentPlanController::class, 'SearchOneTimePurchase'])->name('onetime-purchase-search');
    Route::post('/admin/payment/plan/search', [PaymentPlanController::class, 'SearchPaymentPlans'])->name('payment-plans-search');
    Route::post('/admin/installment/search', [PaymentPlanController::class, 'SearchInstallments'])->name('installment-search');


    //Payment Plan

    Route::get('/admin/create/payment/plan', [PaymentPlanController::class, 'CreatePaymentPlan'])->name('create-payment-plan');
    Route::post('/admin/store/payment/plan', [PaymentPlanController::class, 'StorePaymentPlan'])->name('store-payment-plan');
    Route::get('/admin/view/payment/plans', [PaymentPlanController::class, 'ViewPaymentPlans'])->name('view-payment-plans');
    Route::get('/admin/overview/payment/plans', [PaymentPlanController::class, 'OverviewPaymentPlans'])->name('overview-payment-plans');
    Route::get('/admin/payment/status/{id}', [CustomerController::class, 'PaymentPlanActive'])->name('active-payment-plans');
    Route::get('paymentplan/inactive/{id}', [PaymentPlanController::class, 'PaymentPlanInactive'])->name('paymentplan.inactive');
    Route::get('paymentplan/active/{id}', [PaymentPlanController::class, 'PaymentPlanActive'])->name('paymentplan.active');
    Route::get('paymentplan/active/{id}', [PaymentPlanController::class, 'PaymentPlanActive'])->name('paymentplan.active');

    Route::get('paymentplan/edit/payment/balance/{id}', [PaymentPlanController::class, 'EditPaymentBalance'])->name('edit-balance');
    Route::post('paymentplan/update/payment/balance', [PaymentPlanController::class, 'UpdatePaymentPlanBalance'])->name('update-balance');
     Route::get('paymentplan/details/{id}', [PaymentPlanController::class, 'PaymentPlanDetails'])->name('paymentplan-details');
    
    Route::get('/admin/check/commission', [PaymentPlanController::class, 'ViewCommission'])->name('commission-check');
    Route::get('/invoice/payment/{id}', [PaymentPlanController::class, 'Invoice'])->name('invoice.payment');
    Route::get('/receipt/generate/pp/{id}', [PaymentPlanController::class, 'generatePlanPDF'])->name('receipt-generate-pp');


    Route::get('/change/user/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/update/user/password', [UserController::class, 'UserUpdatePassword'])->name('update-user-password');
   
    Route::get('view/installments/payment/plans', [PaymentPlanController::class, 'ViewInstallments'])->name('view-installments');
    Route::get('/receipt/installment/generate/{id}', [PaymentPlanController::class, 'GenerateInstallmentReceipt'])->name('generate-installment-receipt');
    Route::get('/view/installment/history/{id}', [PaymentPlanController::class, 'ViewInstallment'])->name('installment-history');
    Route::get('/receipt/installments/paymentplan/{id}', [PaymentPlanController::class, 'GeneratePaymentPlanInstallmentsReceipt'])->name('generate-pdf-history');

    Route::get('/edit/installment/details/{id}', [PaymentPlanController::class, 'EditInstallmentDetails'])->name('edit-installment-details');
    Route::post('/update/installment/details', [PaymentPlanController::class, 'UpdateInstallmentDetails'])->name('update-installment-details');

    



});

Route::group(['middleware' => ['auth', 'check.role:Admin,Manager,Chairman,Minister']], function (){

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
    Route::get('/edit/employee/{id}', [EmployeeController::class, 'EmployeeEdit'])->name('employee.edit');
    Route::get('/edit/employee/details/{id}', [EmployeeController::class, 'EmployeeDetails'])->name('employee.details');
    Route::get('/edit/employee/performance/{id}', [EmployeeController::class, 'EmployeePerformance'])->name('employee.performance');

    Route::get('/edit/work/days/employee/{id}', [PayRollController::class, 'EmployeeEditWorkDays'])->name('employee-edit-days');
    Route::post('/admin/update/employee/days', [PayRollController::class, 'EmployeeUpdateDays'])->name('employee-update-days');
    Route::get('/admin/generate/payroll', [PayRollController::class, 'EmployeeGeneratePayroll'])->name('generate-payroll');
    Route::get('/admin/payslip/{id}', [PayRollController::class, 'generatePayslip'])->name('generate-payslip');

    //Reports Module
    Route::get('/admin/report/employees', [ReportsController::class, 'EmployeeFullReport'])->name('report-employee');
    Route::get('/admin/report/export/employees', [ReportsController::class, 'ExportEmployeeFullReport'])->name('report-employee-export');
    Route::get('/admin/report/commission/onetime', [ReportsController::class, 'ExportCommissionOTPFullReport'])->name('report-commission-onetime');
    Route::get('/admin/report/export/commission/onetime', [ReportsController::class, 'ExportExportCommissionOTPFullReport'])->name('report-commission-onetime-export');
    Route::get('/admin/report/commission/pp', [ReportsController::class, 'ExportCommissionPPFullReport'])->name('report-commission-pp');
    Route::get('/admin/report/export/commission/pp', [ReportsController::class, 'ExportExportCommissionPPFullReport'])->name('report-commission-pp-export');
    Route::get('/admin/report/pp', [ReportsController::class, 'PaymentPlanFullReport'])->name('report-paymentplan');
    Route::get('/admin/report/export/pp', [ReportsController::class, 'ExportPaymentPlanFullReport'])->name('report-paymentplan-export');
    Route::get('/admin/report/onetime', [ReportsController::class, 'OneTimePurchaseFullReport'])->name('report-onetime');
    Route::get('/admin/report/export/onetime', [ReportsController::class, 'ExportOneTimePurchaseFullReport'])->name('report-onetime-export');
    Route::get('/admin/report/installments', [ReportsController::class, 'InstallmentsFullReport'])->name('report-installments');
    Route::get('/admin/report/export/installments', [ReportsController::class, 'ExportInstallmentsFullReport'])->name('report-installments-export');
});

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/view/support/details', [DashboardController::class, 'SupportDetails'])->name('support.details');

    
});

Route::group(['middleware' => ['auth', 'check.role:Chairman,Minister']], function (){

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

Route::group(['middleware' => ['auth', 'Minister']], function (){

    Route::get('/minister/settings/suspension', [SettingsController::class, 'Suspension'])->name('suspension');

    Route::post('/minister/settings/reason/store', [SettingsController::class, 'ReasonStore'])->name('create.reason');

    Route::get('/minister/settings/app/suspend/{id}', [SettingsController::class, 'AppInActive'])->name('activate.account');

    Route::get('/minister/settings/app/activate/{id}', [SettingsController::class, 'AppActive'])->name('suspend.account');
});


