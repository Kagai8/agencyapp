<table>
	<thead>
		<tr>
			<th>Payment Plan ID</th>
			<th>Gross Amount</th>
			<th>Net Amount</th>
			<th>Commission</th>
			<th>Commission Percentage</th>
			<th>Date </th>
			<th>Initiated By </th>

			
			 
		</tr>
	</thead>
		<tbody>
		 @foreach($commissions as $item)
		 <tr>
			 <td>PP{{ $item->payment_plan_id }}</td>
			 <td>{{ $item->original_amount }}</td>
			 <td>{{ $item->net_amount }}</td>
			 <td>{{ $item->commission }} </td>
			 <td>{{ $item->commission_premium }} </td>
			 <td> {{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
			 
			 <td>{{ $item->created_by }} </td>
			 
			
								 
		 </tr>
		  @endforeach
		</tbody>
</table>