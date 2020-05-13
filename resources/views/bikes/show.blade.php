@extends("layouts.app")

@section("content")

<div class="container">
	<div class="row">
		<div class="col-12 col-md-8 mx-auto">
			<h1>View Bike</h1>
			<hr>
			@include('bikes.partials.single_bike')
		</div>
	</div>
</div>

@endsection