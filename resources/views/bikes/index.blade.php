@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">

		<div class="container  ">
			<div class="row justify-content-between ml-auto">
				<div class="col-12 col-md-6">
					<h1 class="">Choose a Bike</h1>
				</div>

				<div class="col-12 col-md-6 ml-auto d-flex justify-content-end">
					<form action="{{ route('bikes.index') }}" class="form-inline">
					<h6 class="mx-2">View By Category:</h6>
						<select name="category_id" id="category_id" class="form-control" placeholder="View By Category">
							@foreach($categories as $category)
							<option 
								value="{{ $category->id }}"
								{{ Request::query("category_id") == $category->id ? "selected" : ""}}
							>
								{{ $category->name }}
							</option>
							@endforeach
						</select>

						<button class="btn btn-primary mx-1">Go</button>
					</form>
						
				</div>
				<hr>
			</div>
		</div>

		<div class="col-12  mx-auto">
			<div class="row">
				@foreach($bikes as $bike)
					{{-- do not display if category is softdeleted --}}
					@if (!$bike->category->trashed()) 
					@include('bikes.partials.single_bike')
					@endif
				@endforeach
			</div>
		</div>

	</div>
</div>





@endsection