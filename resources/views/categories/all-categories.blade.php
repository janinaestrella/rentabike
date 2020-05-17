@extends("layouts.app")

@section("content")

	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 mx-auto">

				<h1>All Categories</h1>
				<hr>
				@foreach ($categories as $category)
					@include('categories.partials.category_card')
				@endforeach
			</div>
		</div>
	</div>


@endsection