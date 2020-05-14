@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-12">

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
						<tr>
							<td>__Category__</td>
							<td>__Model Code__</td>
							<td>1
								{{-- <span 
								class="badge badge-sm badge-success
								@if($bike->bikestatus_id == 1)
								badge-success
								@elseif($bike->bikestatus_id == 2)
								badge-danger
								@else
								badge-success
								@endif
								"> available
								{{ $bike->bikeStatus->name }}
							</span> --}}
						</td>
						<td>
							<form action="#" method="post">
								@csrf
								@method('DELETE')
								<button class="btn btn-outline-danger w-100">Remove</button>
							</form>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		{{-- date/calendar --}}
		<div class="row">
			<div class="col-12 col-sm-8 mx-auto">
				<form action="#" method="post" class="mb-5">
					@csrf

					<div class="row align-items-center">
						<div class="col align-self-start">
							<form action="form-group">
								<label for="pickup_date">Pick-up Date</label>
								<input required type="date" min="" name="pickup_date" id="pickup_date" class="form-control" placeholder="Pick-up Date">
							</form>
						</div>

						<div class="col align-self-start">
							<form action="form-group">
								<label for="return_date">Return Date</label>
								<input required type="date" min="" name="return_date" id="return_date" class="form-control" placeholder="Return Date">
							</form>
						</div>
					</div>

					<div class="btn btn-primary">Submit Request</div>
				</form>
			</div>
		</div>	

		<hr>
		<form action="#" method="post" class="my-5">
			@csrf
			@method('DELETE')

			<button class="btn-danger">Clear Request Form</button>
		</form>




		</div>
	</div>
</div>



@endsection