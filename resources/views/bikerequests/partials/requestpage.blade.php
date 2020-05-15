{{-- start of table --}}
<div class="table-responsive">
	<table class="table table-hover text-center">
		<thead>
			<tr>
				<th>Bike Type</th>
				<th>Bike Model</th>
				<th>Current Status</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			{{-- start of item --}}
			{{-- {{dd($bikes)}} --}}
			@foreach ($bikes as $bike)
			<tr>
				<td>{{ $bike->category->name}}</td>
				<td>{{ $bike->model_code }}</td>
				<td>
					<span 
					class="badge badge-sm badge-success
					@if($bike->bikestatus_id == 1)
					badge-success
					@elseif($bike->bikestatus_id == 2)
					badge-danger
					@else
					badge-warning
					@endif
					"> 
					{{ $bike->bikeStatus->name }}
				</span>
				</td>
				<td>
					<form action="{{ route('bikerequests.destroy', ['bikerequest' => $bike->id])}}" method="post">
						@csrf
						@method('DELETE')
						<button class="btn btn-outline-danger w-100">Remove</button>
					</form>
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
</div>
{{-- end of table --}}

{{-- date/calendar --}}
<div class="row">
	<div class="col-12 col-sm-8 mx-auto">
		<form action="{{ route('rentaltransactions.store') }}" method="post" class="mb-5">
			@csrf

			<div class="row align-items-center">
				<div class="col align-self-start">
					<div action="form-group">
						<label for="pickup_date">Pick-up Date</label>
						<input required type="date" min="{{ date('Y-m-d')}}" name="pickup_date" id="pickup_date" class="form-control" placeholder="Pick-up Date">
					</div>
				</div>

				<div class="col align-self-start">
					<div action="form-group">
						<label for="return_date">Return Date</label>
						<input required type="date" min="{{ date('Y-m-d')}}" name="return_date" id="return_date" class="form-control" placeholder="Return Date">
					</div>
				</div>
			</div>

			<button class="btn btn-primary" type="submit">Submit Request</button>
		</form>
	</div>
</div>	
{{-- end of date/calendar --}}
<hr>
<form action="{{route('bikerequests.clear')}}" method="post" class="my-5">
	@csrf
	@method('DELETE')

	<button class="btn btn-danger">Clear Request Form</button>
</form>
