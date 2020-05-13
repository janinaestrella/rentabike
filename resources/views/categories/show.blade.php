@extends("layouts.app")

@section("content")

	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 mx-auto">
				@include("categories.partials.category_card")
			</div>
		</div>
	</div>

@endsection