<table>
	<thead>
										<tr>
											<th>Installment ID</th>
											<th>Payment Plan ID</th>
											<th>Customer Name </th>
											<th>Installment </th>
											<th>Recorded By </th>
											<th>Created At</th>
											
										</tr>
									</thead>
										<tbody>
										 @foreach($installments as $item)
										 <tr>
										 	<td>IM{{ $item->id }}</td>
											 <td>PP{{ $item->payment_plan_id }}</td>
											 <td>{{ $item->customer_name }}</td>
											 <td>{{ $item->installment }} </td>
											 <td> {{ $item->recorded_by }}</td>
											 <td> {{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
											 
																							 
										 </tr>
										  	@endforeach
										</tbody>
</table>