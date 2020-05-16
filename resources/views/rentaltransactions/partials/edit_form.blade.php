<div class="card">
	<div class="card-body">
		<form action="{{ route('rentaltransactions.update', ['rentaltransaction' => $rentaltransaction->id])}}" method="post">
			@csrf
			@method('PUT')

			<label for="rentstatus_id">Change Status</label>
			<select name="rentstatus_id" id="rentstatus_id" class="form-control form-control-sm">

				@foreach ($rentalstatuses as $rentalstatus)

				<option 
					value="{{$rentalstatus->id}}"
					{{ $rentalstatus->id == $rentaltransaction->rentstatus_id ? "selected" : ""}}
				>
						{{$rentalstatus->name}}
				</option>

				@endforeach
			</select>
				<button class="btn btn-primary btn-sm my-1">Change Status</button>

		</form>
	</div>
</div>