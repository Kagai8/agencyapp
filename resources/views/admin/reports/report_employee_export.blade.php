<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email </th>
            <th>Designation </th>
            <th>Phone </th>
            <th>Gender </th>
            <th>Date Joined </th>
            <th>Employment Period</th>
            <th>National ID </th>
            <th>NSSF NO </th>
            <th>NHIF NO </th>
            <th>KRA PIN </th>
            <th>Bank Name </th>
            <th>Bank Branch</th>
            <th>Bank Account Number</th>
            <th>Basic Salary </th>
            <th>Housing Allowances </th>
            <th>Other Allowances </th>
            <th>Employee Bonuses </th>
            <th>PAYE</th>
            <th>NSSF</th>
            <th>NHIF</th>
            <th>COTU </th>
            <th>Loan </th>
            <th>Account Created By </th>                                            
            <th>Created At </th>
        </tr>
    </thead>
    <tbody>
             @foreach($employees as $item)
             <tr>
                    <td>{{ $item->employee_name }}</td>
                     <td>{{ $item->employee_email }}</td>
                     <td>{{ $item->employee_designation }} </td>
                     <td> {{ $item->employee_phone_no }}</td>
                     <td> {{ $item->employee_gender }}</td>
                     <td>{{ $item->date_joined}}</td>
                     @php
                    $dateJoined = \Carbon\Carbon::parse($item->date_joined);
                    $now = \Carbon\Carbon::now();
                    $diff = $dateJoined->diff($now);
                    $years = $diff->y;
                    $months = $diff->m;
                    $days = $diff->d;
                    @endphp
                     <td>{{ $years }} years, {{ $months }} months, and {{ $days }} days</td>
                     <td>{{ $item->employee_national_id }} </td>
                     <td>{{ $item->nhif_no }} </td>
                     <td>{{ $item->employee_nssf_no }} </td>
                     <td>{{ $item->employee_kra_pin }} </td>
                     <td>{{ $item->employee_bank_name }} </td> 
                     <td> {{ $item->employee_bank_branch }}</td>
                     <td> {{ $item->employee_bank_acc_no}}</td>
                     <td>{{ $item->employee_basic_salary }} </td>
                     <td> {{ $item->employee_housing_allowance }}</td>
                     <td> {{ $item->other_allowances }}</td>
                     <td>{{ $item->employee_bonuses }}</td>
                     <td>{{ $item->employee_paye }}</td>
                     <td>{{ $item->employee_nssf }} </td>
                     <td> {{ $item->employee_nhif }}</td>
                     <td> {{ $item->employee_cotu }}</td>
                     <td>{{ $item->employee_loans }}</td>
                     
                     <td>{{ $item->created_by }}</td>
                    <td> {{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}} </td>
             </tr>
              @endforeach
    </tbody>
</table>
