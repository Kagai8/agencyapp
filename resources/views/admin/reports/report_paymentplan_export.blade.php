<table>
	<thead>
										<tr>
											<th>Payment Plan ID</th>
											<th>Name </th>
											<th>Gross Amount</th>
											<th>Net Amount </th>
											<th>Balance</th>
											<th>Approval </th>
											<th>Planned Months</th>
											<th>Remaining months </th>
											<th>Active Status</th>
											<th>Commission Credited</th>
											<th>Commission Percentage</th>
											<th>Created By </th>
											<th>Created At</th>
											
											
											
											 
										</tr>
									</thead>
										<tbody>
										 @foreach($payment_plans as $item)
										 <tr>
											 <td width="10%">PP{{ $item->id }}</td>
											 <td>{{ $item->customer_name }}</td>
											 <td>{{ $item->net_amount }} </td>
											 <td>{{ $item->original_amount }} </td>
											 <td> {{ $item->balance }}</td>

											 <td>
											 	@if($item->approval == 1)
											 	<p> Approved </p>
											 	@else
									       <p> Pending  </p>
											 	@endif

											 </td>
											 <td>{{ $item->months }} </td>
											 <td> {{ $item->months_left }}</td>
											<td>
												@if($item->status == 1)
                            <p>Done</p>
                            @else
                            <p>Not Done</p>
                            @endif
											</td>
											<td>
												@if($item->commission_credited == 1)
                            <p>Credited</p>
                            @else
                            <p>Not Credited</p>
                            @endif
											</td>
											<td>{{$item->commission_premium}}</td>
											<td>
												{{ $item->created_by}}
											</td>
											<td>{{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}} </td>
																				 
										 </tr>
										  	@endforeach
										</tbody>
							 
						  			</table>
