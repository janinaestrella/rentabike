@extends('layouts.app')
@section('content')

<div class="container">	
			<h1 class="text-center">Add a Bike</h1>
			<hr>
	<div class="row">
		<div class="col-12 col-md-8 mx-auto">
			

			@includeWhen(Session::has('message'),'partials.message_flash')
			@includeWhen($errors->any(), 'partials.error_message')

			<form action="{{ route('bikes.store')}}" method="post" enctype="multipart/form-data">
				
				@csrf

				<div class="form-group">
					<label for="name">Bike Name:</label>
					<input type="text" name="name" id="name" class="form-control"
					value=" {{ old('name') }}">
				</div>
				
				{{-- newwwwwwwwwww --}}
				{{-- <div class="form-group">

					<label for="name">Bike Model:</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							@foreach($categories as $category)
							<span class="input-group-text" id="basic-addon1">{{ $category->id }} -
							</span>
							@endforeach
						</div>


						<input class="form-control" type="text
						model_code" name="model_code" placeholder="Unit Control Code" value="RANDOMMMM">
					</div>

				</div> --}}
				{{-- endddddddddd --}}

				<div class="form-group">
					<label for="image">Bike Image:</label>
					<input type="file" name="image" id="image" class="form-control-file">
				</div>

				<div class="row">
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label for="category_id">Bike Category:</label>
							<select name="category_id" id="category_id" class="form-control">
								@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-12 col-md-6">
						<div class="form-group">
							<label for="bikestatus_id">Bike Status:</label>
							<select name="bikestatus_id" id="bikestatus_id" class="form-control">
								@foreach($statuses as $status)
								<option value="{{ $status->id }}">{{ $status->name }}</option>
								@endforeach
							</select>
						</div>		
					</div>
				</div>
				
				

				<div class="form-group">
					<label for="description">Description:</label>
					<textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
				</div>


				<div class="text-center">
					<button class="btn btn-success px-5" type="submit">Add New Bike</button>
				</div>
			</form> 




			


		</div>
	</div>
</div>

@endsection