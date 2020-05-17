<div class="card">
	<div class="card-header" id="headingOne">
		<p class="mb-0 w-100 d-flex justify-content-between align-items-center">
			<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$rentaltransaction->id}}" >
				<span>{{$rentaltransaction->code}} </span>	
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
				

					
			</button>
			<span>Booking Date: {{ date('M d, Y - h:i:s',strtotime($rentaltransaction->created_at)) }} </span>
		</p>
	</div>

	<div id="collapse{{$rentaltransaction->id}}" class="collapse" data-parent="#accordionExample">	
		@include('rentaltransactions.partials.single_card')
	</div>
</div>