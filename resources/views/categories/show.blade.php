@extends("layouts.app")

@section("content")

<div class="container">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>Category: {{ $category->name }}</h1> 
					<small><span>Current Available: {{$availablebikes}} / {{$totalcount}}</span></small>
					<hr>	
				</div>
			</div>
		</div>
		
		@can('isAdmin')
		<div class="col-12 col-md-4 col-lg-3 mx-auto">
			<h2>Add New Bike</h2>

			@includeWhen(Session::has('message'),'partials.message_flash')
			@includeWhen($errors->any(), 'partials.error_message')
			<form action="{{ route('bikes.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				
				<div class="form-group">
					<label for="name">Bike Model:</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">{{ $category->id }}-
							</span>
						</div>

						<input type="hidden" name="category_id" value="{{ $category->id }}" >
						<input class="form-control" type="text" id="model_code" name="model_code" value="{{ $bike->model_code }}">
					</div>
				</div>

				<div class="form-group">
					<label for="image">Bike Image:</label>
					<input type="file" name="image" id="image" class="form-control-file">
				</div>

				<div class="form-group">
					<label for="description">Description:</label>
					<textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
				</div>

				<div class="text-center">
					<button class="btn btn-success px-5" type="submit">Add</button>
				</div>
				
			</form>
		</div>
		@endcannot
		
		<div class="col-12 col-md-8 col-lg-9">
			<div class="row">

			@foreach($bikepercategory as $bike)
					@include('bikes.partials.single_bike')
			@endforeach
			</div>
		</div>
	</div>
</div>

@endsection