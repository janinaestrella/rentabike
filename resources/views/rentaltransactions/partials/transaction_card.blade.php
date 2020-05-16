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
					badge-sucess
					@elseif ($rentaltransaction->rentstatus_id == 3)
					badge-danger
					@elseif ($rentaltransaction->rentstatus_id == 4)
					badge-info
					@else
					badge-primary
					@endif
					">	
					{{ $rentaltransaction->rentalstatus->name }}
				</span>

					
			</button>

			{{-- <span>
				<a href="{{route('rentaltransactions.show', ['rentaltransaction' => $rentaltransaction->id])}}">View Transaction
				</a>
			</span> --}}	
		</p>
	</div>

	<div id="collapse{{$rentaltransaction->id}}" class="collapse" data-parent="#accordionExample">	
		@include('rentaltransactions.partials.single_card')
	</div>
</div>