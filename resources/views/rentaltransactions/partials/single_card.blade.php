<div class="card-body">
			{{-- customer --}}
			<div class="row">
				<div class="col">Customer Name:</div>
				<div class="col">{{ $rentaltransaction->user->name }}</div>
			</div>
			{{-- code --}}
			<div class="row">
				<div class="col">Transaction Code:</div>
				<div class="col">{{ $rentaltransaction->code }}</div>
			</div>
			{{-- date --}}
			<div class="row">
				<div class="col">Pick-Up Date:</div>
				<div class="col">{{ date('M d, Y',strtotime($rentaltransaction->pickup_date) )}}</div>
			</div>

			<div class="row">
				<div class="col">Return Date:</div>
				<div class="col">{{ date('M d, Y',strtotime($rentaltransaction->return_date) )}}</div>
			</div>
			{{-- status --}}
			<div class="row">
				<div class="col">Transaction Status:</div>
				<div class="col">
					<span 
					class="badge badge-sm
					@if ($rentaltransaction->rentstatus_id ==1 )
					badge-warning
					@elseif ($rentaltransaction->rentstatus_id == 2)
					badge-success
					@elseif ($rentaltransaction->rentstatus_id == 3)
					badge-danger
					@elseif ($rentaltransaction->rentstatus_id == 4)
					badge-secondary
					@else
					badge-info
					@endif
					">	
					{{ $rentaltransaction->rentalstatus->name }}
					</span>
					
					@can('isAdmin')
						@include('rentaltransactions.partials.edit_form') 
					@endcan('isAdmin')
				</div>
			</div>

			{{-- invoice --}}

			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Requested Bike Type</th>
							<th>Requested Bike Model</th>
							<th>Current Bike Status</th>
						</tr>
					</thead>

					<tbody>
						{{-- item entry start --}}
						{{-- {{ dd($rentaltransaction->bikes}} --}}
						@foreach ($rentaltransaction->bikes as $bike)
						<tr>
							<td>{{ $bike->category->name}}</td>
							<td>{{ $bike->model_code}}</td>
							<td>
							<span 
								class="badge badge-sm
								@if ($bike->bikestatus->_id ==1 )
								badge-warning
								@elseif ($bike->bikestatus->status_id == 2)
								badge-success
								@elseif ($bike->bikestatus->status_id == 3)
								badge-danger
								@elseif ($bike->bikestatus->status_id == 4)
								badge-secondary
								@else
								badge-info
								@endif
								">	
								{{ $bike->bikestatus->name }}
							</span>


							</td>
	
						</tr>
						@endforeach
						{{-- item entry end --}}
					</tbody>

					{{-- <tfoot>
						<tr>
							<td colspan="3" class="text-right">Total</td>
							<td>&#8369; {{ $transaction->total }}</td>
						</tr>
					</tfoot> --}}

				</table>
			</div>
			
		</div>