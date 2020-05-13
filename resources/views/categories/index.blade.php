@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>Bike Category</h1>
					<hr>	
				</div>
			</div>
		</div>

		<div class="col-12 col-md-4 mx-auto">
			<form action="{{ route('categories.store') }}" method="post">
				@csrf

				<input type="text" class="form-control w-100" id="name" name="name" placeholder="Input New Category">

				<button class="btn btn-primary my-1 w-100">Add New Category</button>

			</form>
		</div>

		<div class="col-12 col-md-8 mx-auto">

			@includeWhen(Session::has('message'),'partials.message_flash')
			@includeWhen($errors->any(), 'partials.error_message')

			<ul class="list-group">
				@foreach($categories as $category)
					@include("categories.partials.category_card")
				@endforeach
			</ul>

			{{-- start of accor --}}
			{{-- <div class="accordion" id="accordionExample">
				@foreach($categories as $category)
					@include("categories.partials.category_accordion")
				@endforeach
			</div> --}}
			{{-- end of accord --}}


		</div>

	</div>
</div>


@endsection