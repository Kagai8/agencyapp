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
            background-color: #f4f4f4;
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            background-color: #1a73d3;
            color: white;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .net-pay {
            background-color: #1a73d3;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .signature {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
    	 <div class="logo-container">
            <img src="" alt="" class="logo">
        </div>
        <div class="header">

            <span>Working Branch: Kitale</span>
        </div>
        <div class="employee-details">
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
                    <td>KES {{ $employee->employee_commission }}</td>
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
            <div class="net-pay">
                <span class="fw-bold">NET PAY: KES {{$netPay}}</span>
            </div>
        </div>
        <div class="signature">
            <span class="fw-bolder">For Kalyan Jewellers</span><br>
            <span>Authorised Signatory</span>
        </div>
    </div>






</body>

</html>
