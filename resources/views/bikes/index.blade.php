@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">

		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1>Choose a Bike</h1>
					<hr>	
				</div>
			</div>
		</div>

		<div class="col-12 col-md-4 mx-auto">
			<h6>View By Category</h6>
				<form action="{{ route('bikes.index') }}">
					<select name="category_id" id="category_id" class="form-control">
						@foreach($categories as $category)
						<option 
							value="{{ $category->id }}"
							{{ Request::query("category_id") == $category->id ? "selected" : ""}}
						>
							{{ $category->name }}
						</option>


						@endforeach
					</select>

					<button class="btn btn-primary my-1 w-100">View By Category</button>
	
				</form>
		</div>

		<div class="col-12 col-md-8 mx-auto">
			<div class="row">
				@foreach($bikes as $bike)
					<div class="col-12 col-md-4 col-lg-4 my-3">

						{{-- start of cards --}}
						<div class="card">
							<img src="{{ $bike->image }}" alt="" class="card-img-top">
							<div class="card-body h-100">
								<h6 class="card-title">{{ $bike->name }}</h6>
								<p class="card-text"> &#8369; <span>{{ number_format($bike->price,2) }}</span></p>
								<p class="badge badge-info">{{ $bike->category->name }}</p>
								<p class="card-text">{{ $bike->description }}</p>

								@cannot('isAdmin')
								<form action="{{ route('carts.update', ['cart' => $bike->id]) }}" method="post">
									@csrf
									@method('PUT')

									<input type="number" name="quantity" id="quantity" class="form-control my-1" data-id="{{ $bike->id}}" placeholder="Quantity" min="1">
									<button class="btn btn-primary w-100 my-1 add-to-cart" data-id="{{ $bike->id}}" type="button">Add to Cart</button>
								</form>


								<a href="{{ route('bikes.show', ['bike' => $bike->id]) }}" class="btn btn-success w-100">View</a>
								@else
								<a href="{{ route('bikes.edit', ['bike' => $bike->id]) }}" class="btn btn-warning w-100 my-1">Edit</a>

								<form action="{{ route('bikes.destroy', ['bike' => $bike->id])}}" method="POST">
									@csrf
									@method('DELETE')

									<button class="btn btn-danger w-100 my-1">Delete</button>

								</form>
								@endcannot
							</div>
						</div>
						{{-- end of cards --}}

					</div>
				@endforeach
			</div>
		</div>

	</div>
</div>





@endsection