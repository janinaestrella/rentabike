<div class="card">
	<div class="card-body">
		<form action="{{ route('rentaltransactions.update', ['rentaltransaction' => $rentaltransaction->id])}}" method="post">
			@csrf
			@method('PUT')

			<label for="rentalstatus_id">Change Status</label>
			<select name="rentalstatus_id" id="rentalstatus_id" class="form-control form-control-sm">

				@foreach ($rentalstatuses as $rentalstatus)

				<option 
					value="{{$rentalstatus->id}}"
					{{ $rentalstatus->id == $rentaltransaction->rentalstatus_id ? "selected" : ""}}
				>
						{{$rentalstatus->name}}
				</option>

				@endforeach
			</select>
				<button class="btn btn-primary btn-sm my-1">Edit</button>



		</form>
	</div>
</div>