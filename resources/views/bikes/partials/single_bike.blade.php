<div class="col-12 col-md-4 col-lg-4 my-3">

	{{-- start of cards --}}
	<div class="card">
		<img src="{{ $bike->image }}" alt="" class="card-img-top">

		<div class="card-body h-100">
			<div class="d-flex justify-content-between">
			<h6 class="card-title"><strong>{{ $bike->name }}</strong></h6>
			</div>
			<p class="card-text"> Current Available: {{ $bike->stock }}</p>
			<p class="badge badge-info">{{ $bike->category->name }}</p>
			<p class="card-text">{{ $bike->description }}</p>

			{{-- @cannot('isAdmin') --}}
			<form action="{{ route('requests.update', ['request' => $bike->id]) }}" method="post">	
				
				@csrf
				@method('PUT')

				<input type="number" name="quantity" id="quantity" class="form-control my-1" data-id="{{ $bike->id}}" placeholder="Quantity" min="1" max="{{ $bike->stock }}">
				
				@if ($bike->stock === 0)
				
				<button class="btn btn-secondary w-100 my-1 add-to-cart" data-id="{{ $bike->id }}"  disabled>NOT AVAILABLE</button>

				@else

				<button class="btn btn-primary w-100 my-1 add-to-cart" data-id="{{ $bike->id }}" >Request to Rent</button>


				@endif

			</form>

			<a href="{{ route('bikes.show', ['bike' => $bike->id]) }}" class="btn btn-success w-100">View</a>
			
			{{-- @else --}}

			<a href="{{ route('bikes.edit', ['bike' => $bike->id]) }}" class="btn btn-warning w-100 my-1">Edit</a>

			<form action="{{ route('bikes.destroy', ['bike' => $bike->id])}}" method="POST">
				@csrf
				@method('DELETE')

				<button class="btn btn-danger w-100 my-1">Delete</button>

			</form>

			{{-- @endcannot --}}
		</div>
	</div>
	{{-- end of cards --}}

</div>