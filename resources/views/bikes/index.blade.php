@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">

		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="text-center">Choose a Bike</h1>
					<hr>	
				</div>
			</div>
		</div>

		<div class="col-12 col-md-4 mx-auto">
			<h6>View By Category</h6>
				<form action="{{ route('bikes.index') }}">
					<select name="category_id" id="category_id" class="form-control">
						@foreach($categories as $category)
						<option 
							value="{{ $category->id }}"
							{{ Request::query("category_id") == $category->id ? "selected" : ""}}
						>
							{{ $category->name }}
						</option>
						@endforeach
					</select>

					<button class="btn btn-primary my-1 w-100">View By Category</button>
	
				</form>
		</div>

		<div class="col-12 col-md-8 mx-auto">
			<div class="row">
				@foreach($bikes as $bike)
					@include('bikes.partials.single_bike')
				@endforeach
			</div>
		</div>

	</div>
</div>





@endsection