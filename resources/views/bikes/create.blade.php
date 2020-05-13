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
							<label for="stock">Stock:</label>
							<input type="number" name="stock" id="stock" class="form-control" value=" {{ old('stock') }}" min="1">
						</div>		
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