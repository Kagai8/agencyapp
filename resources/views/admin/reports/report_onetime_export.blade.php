<table>
	<thead>
										<tr>
											<th>One Time Purchase ID</th>
											<th>Name </th>
											<th>Gross Amount </th>
											
											<th>Created By </th>
											<th>Created At</th>
											<th>Date</th>
											
											
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($onetime_purchases as $item)
										 <tr>
											 <td>OTP{{ $item->id }}</td>
											 <td>{{ $item->customer_name }}</td>
											 <td>{{ $item->original_amount }} </td>
											 <td>{{ $item->net_amount }} </td>

											 
											 <td>{{ $item->created_by }} </td>
											
											 <td> {{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
											 
											 


											
																 
										 </tr>
										  @endforeach
										</tbody>
</table>