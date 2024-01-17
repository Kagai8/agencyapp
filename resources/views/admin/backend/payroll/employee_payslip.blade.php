<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payslip for {{ $employee->employee_name }}, {{ now()->format('F Y') }}</title>

        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }

        .container {
            margin-top: 10px;
            margin-bottom: 10px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            
        }

        .header {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }

        .header span {
            display: table-cell;
            text-align: right;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 100px; /* Adjust the width as needed */
            height: auto;
        }

        .employee-details {
            width: 100%;
            display: table;
            margin-bottom: 20px;
        }

        .bank-details {
            margin-top: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .bank-details h2 {
            color: #57B223;
            border-bottom: 2px solid #57B223;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .bank-details .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .bank-details .row div {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .row {
            display: table-row;
            background-color: #f9f9f9;
        }

        .row div {
            display: table-cell;
            padding: 10px;
        }

        .row:nth-child(even) {
            background-color: #e6e6e6;
        }

        .earnings-deductions-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .earnings-deductions-table th,
        .earnings-deductions-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .earnings-deductions-table th {
            background-color: #57B223;
            color: white;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .net-pay {
            background-color: #57B223;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .signature {
            margin-top: 20px;
            text-align: center;
        }

        .employee-details {
        border: 1px solid #000; /* Add a border around the entire employee details */
        padding: 10px; /* Optional: Add some padding for better appearance */
    }

    .employee-details .row {
        border-bottom: 1px solid #ccc; /* Add a bottom border to each row */
        padding: 5px 0; /* Optional: Add some vertical padding for better appearance */
    }

    .employee-details .row:last-child {
        border-bottom: none; /* Remove bottom border for the last row */
    }
    .header-container {
        border-bottom: 2px solid #000; /* Add a border at the bottom */
        margin-bottom: 10px; /* Optional: Add some space below the border for better appearance */
        overflow: hidden; /* Clear the float if any child elements use float */
    }

    .header-container h2 {
         /* Make the heading inline-block to avoid full width */
        display: block; /* Make the heading a block-level element to take full width */
        background-color: #fff; /* Optional: Set background color to match the parent background */
        padding-right: 20px; /* Optional: Add some space to the right of the heading for better appearance */
        margin-right: 20px; Optional: Add some space to the right of the heading for better appearance */
    }
    </style>
</head>

<body>
    <div class="logo-container">
            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('logo/logobilabg.png'))) }}" alt="" class="logo" style="width: 200px;">

        </div>
    <div class="container">
        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path($employee->employee_image))) }}" alt="Your Image" style="width: 100px; margin-right: 10px;">
        <div class="large-header text-center" style="background-color: #ffffff;">

            <h2 style="text-align: right">Payslip for {{ now()->format('F Y') }}</h2>
            <h1 style="text-align: right">{{ $employee->employee_name }}</h1>
        </div>
        



        <div class="employee-details">
            <div >
                    <h2 >Employee and Bank Details</h2>
            </div>
            <div class="row" >
                <div style="border: 1px solid #ddd; padding: 10px; border-radius: 5px;">
                    <span class="fw-bolder">Bank Name:</span>
                    <small class="ms-3">{{ $employee->employee_bank_name }}</small>
                </div>
                <div style="border: 1px solid #ddd; padding: 10px; border-radius: 5px;">
                    <span class="fw-bolder">Employee Acc. No:</span>
                    <small class="ms-3">{{ $employee->employee_bank_acc_no }}</small>
                </div>
            </div>
            <div class="row">
                <div style="border: 1px solid #ddd; padding: 10px; border-radius: 5px;">
                    <span class="fw-bolder">Bank Branch Name:</span>
                    <small class="ms-3">{{ $employee->employee_bank_branch }}</small>
                </div>
                
            </div><br><br>
            <div class="row">
                <div>
                    <span class="fw-bolder">Employee Code:</span>
                    <small class="ms-3">E00{{ $employee->id }}</small>
                </div>
                <div>
                    <span class="fw-bolder">Employee Name:</span>
                    <small class="ms-3">{{ $employee->employee_name }}</small>
                </div>
            </div>
            <div class="row">
                <div>
                    <span class="fw-bolder">Employee Phone:</span>
                    <small class="ms-3">{{ $employee->employee_phone_no }}</small>
                </div>
                <div>
                    <span class="fw-bolder">Employee Email:</span>
                    <small class="ms-3">{{ $employee->employee_email }}</small>
                </div>
            </div>
            <div class="row">
                <div>
                    <span class="fw-bolder">Employee KRA PIN:</span>
                    <small class="ms-3">{{ $employee->employee_kra_pin }}</small>
                </div>
                <div>
                    <span class="fw-bolder">Employee NHIF No:</span>
                    <small class="ms-3">{{ $employee->nhif_no }}</small>
                </div>
            </div>
            <div class="row">
                <div>
                    <span class="fw-bolder">Employee NSSF No:</span>
                    <small class="ms-3">M{{ $employee->employee_nssf_no }}</small>
                </div>
                <div>
                    <span class="fw-bolder">Employee Designation:</span>
                    <small class="ms-3">{{ $employee->employee_designation }}</small>
                </div>
            </div>
            <div class="row">
                <div>
                    <span class="fw-bolder">Employee Gender:</span>
                    <small class="ms-3">{{ $employee->employee_gender }}</small>
                </div>
                <div>
                    <span class="fw-bolder">Employee Date Joined:</span>
                    <small class="ms-3">{{ $employee->date_joined }}</small>
                </div>
            </div>
            <div class="row">
                <div>
                    <span class="fw-bolder">Employee National ID:</span>
                    <small class="ms-3">{{ $employee->employee_national_id }}</small>
                </div>
                <div>
                    <span class="fw-bolder">Employee Days Worked:</span>
                    <small class="ms-3">{{ $employee->days_worked }}</small>
                </div>
            </div>
        </div>

     
        <table class="earnings-deductions-table">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">Earnings</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Deductions</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Basic Salary</th>
                    <td>KES {{ $employee->employee_basic_salary }}</td>
                    <th scope="row">PAYE</th>
                    <td>KES {{ $employee->employee_paye }}</td>
                </tr>
                <tr>
                    <th scope="row">Housing Allowance:</th>
                    <td>KES {{ $employee->employee_housing_allowance }}</td>
                    <th scope="row">NSSF:</th>
                    <td>KES {{ $employee->employee_nssf }}</td>
                </tr>
                <tr>
                    <th scope="row">Commission:</th>
                    <td>KES {{ $employee->employee_comission }}</td>
                    <th scope="row">NHIF:</th>
                    <td>KES {{ $employee->employee_nhif }}</td>
                </tr>
                <tr>
                    <th scope="row">Other Allowances:</th>
                    <td>KES {{ $employee->other_allowances }}</td>
                    <th scope="row">COTU:</th>
                    <td>KES {{ $employee->employee_cotu }}</td>
                </tr>
                <tr>
                    <th scope="row">Bonuses:</th>
                    <td>KES {{ $employee->employee_bonuses }}</td>
                    <th scope="row">Loans:</th>
                    <td>KES {{ $employee->employee_loans }}</td>
                </tr>
                @php
				    // Calculate total earnings
				    $totalEarnings = $employee->employee_basic_salary +
				        $employee->employee_housing_allowance +
				        $employee->employee_commission +
				        $employee->other_allowances +
				        $employee->employee_bonuses;

				    // Calculate total deductions
				    $totalDeductions = $employee->employee_paye +
				        $employee->employee_nssf +
				        $employee->employee_nhif +
				        $employee->employee_cotu +
				        $employee->employee_loans;

				    // Calculate net pay
				    $netPay = $totalEarnings - $totalDeductions;
				@endphp
                <tr>
                    <th scope="row">TOTAL EARNINGS:</th>
                    <td>KES {{ $totalEarnings }}</td>
                    <th scope="row">TOTAL DEDUCTIONS:</th>
                    <td>KES {{ $totalDeductions }}</td>
                </tr>
            </tbody>
        </table>
        <div class="footer">
            <div class="net-pay" style="text-align: right">
                <span class="fw-bold" >NET PAY: KES {{$netPay}}</span>
            </div>
        </div>
        <div class="signature">
            <div class="signature-line">
                        <hr>
                        <p>Signature: ________________________</p>
                        <p>Signed by: ________________________</p>
            </div>
            <span class="fw-bolder">Green Line Insurance Agency</span><br>            
        </div>
    </div>






</body>

</html>
