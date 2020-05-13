<div class="col-12 col-md-6 col-lg-6 my-3">

	{{-- start of cards --}}
	<div class="card">
		<img src="{{ $bike->image }}" alt="" class="card-img-top">

		<div class="card-body h-100">
			<h6 class="card-title"><strong>{{ $bike->name }}</strong></h6>
			<p class="card-text"> Current Available: {{ $bike->stock }}</span></p>
			<p class="badge badge-info">{{ $bike->category->name }}</p>
			<p class="card-text">{{ $bike->description }}</p>

			{{-- @cannot('isAdmin') --}}
			<form action="{{-- {{ route('bikes.update', ['cart' => $bike->id]) }} --}}" method="post">
				@csrf
				@method('PUT')

				<input type="number" name="quantity" id="quantity" class="form-control my-1" data-id="{{ $bike->id}}" placeholder="Quantity" min="1" max="{{ $bike->stock }}">
				<button class="btn btn-primary w-100 my-1 add-to-cart" data-id="{{ $bike->id}}" type="button">Request to Rent</button>
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