@extends("layouts.app")

@section("content")

<div class="container">
			<h1 class="text-center">Edit Bike</h1>
			<hr>
	<div class="row">
		<div class="col-12 col-md-8 mx-auto">

			@includeWhen($errors->any(), 'partials.error_message')
			
			<form action="{{ route('bikes.update', ['bike' => $bike->id]) }}" method="post" enctype="multipart/form-data">
				
				@csrf
				@method('PUT')

				<div class="form-group">
					<label for="name">Bike Name:</label>
					<input type="text" name="name" id="name" class="form-control"
					value=" {{ $bike->name }}">
				</div>

				<div class="row">
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label for="category_id">Bike Category:</label>
							<select name="category_id" id="category_id" class="form-control">
								@foreach($categories as $category)
								<option 
						value="{{ $category->id }}"
						{{ $bike->category_id === $category->id ? "selected" : "" }}>
							{{ $category->name }}
						</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-12 col-md-6">
						<div class="form-group">
							<label for="image">Bike Image:</label>
							<input type="file" name="image" id="image" class="form-control-file">
						</div>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="form-group">
							<label for="stock">Stock:</label>
							<input type="text" name="stock" id="stock" class="form-control"  min="1" value=" {{$bike->stock}} "> 
	
						</div>	
						
					</div>

					{{-- <div class="col-12 col-md-6">
						<div class="form-group">
							<label for="bikestatus_id">Bike Status:</label>
							<select name="bikestatus_id" id="bikestatus_id" class="form-control">
								@foreach($statuses as $status)
								<option value="{{ $status->id }}">{{ $status->name }}</option>
								@endforeach
							</select>
						</div>
					</div> --}}
				</div>
				

				<div class="form-group">
					<label for="description">Description:</label>
					<textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $bike->description }}</textarea>
				</div>


				<div class="text-center">
					<button class="btn btn-success px-5" type="submit">Save Changes</button>
				</div>
			</form> 

		</div>
	</div>

</div>

@endsection